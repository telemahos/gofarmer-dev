<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Followers.Settings.View');
		$this->load->model('followers_model', null, true);
		$this->lang->load('followers');
		
		Template::set_block('sub_nav', 'settings/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->followers_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('followers_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('followers_delete_failure') . $this->followers_model->error, 'error');
				}
			}
		}

		$records = $this->followers_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Followers');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Followers object.
	*/
	public function create()
	{
		$this->auth->restrict('Followers.Settings.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_followers())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('followers_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'followers');

				Template::set_message(lang('followers_create_success'), 'success');
				redirect(SITE_AREA .'/settings/followers');
			}
			else
			{
				Template::set_message(lang('followers_create_failure') . $this->followers_model->error, 'error');
			}
		}
		Assets::add_module_js('followers', 'followers.js');

		Template::set('toolbar_title', lang('followers_create') . ' Followers');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Followers data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('followers_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/followers');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Followers.Settings.Edit');

			if ($this->save_followers('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('followers_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'followers');

				Template::set_message(lang('followers_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('followers_edit_failure') . $this->followers_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Followers.Settings.Delete');

			if ($this->followers_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('followers_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'followers');

				Template::set_message(lang('followers_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/followers');
			} else
			{
				Template::set_message(lang('followers_delete_failure') . $this->followers_model->error, 'error');
			}
		}
		Template::set('followers', $this->followers_model->find($id));
		Assets::add_module_js('followers', 'followers.js');

		Template::set('toolbar_title', lang('followers_edit') . ' Followers');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_followers()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_followers($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['foll_id'] = $id;
		}

		
		$this->form_validation->set_rules('followers_user_id','User ID','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('followers_follower_id','Follower ID','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('followers_block','Block','trim|xss_clean|max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['user_id']        = $this->input->post('followers_user_id');
		$data['follower_id']        = $this->input->post('followers_follower_id');
		$data['block']        = $this->input->post('followers_block');

		if ($type == 'insert')
		{
			$id = $this->followers_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->followers_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}