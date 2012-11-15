<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Gfusers.Settings.View');
		$this->load->model('gfusers_model', null, true);
		$this->lang->load('gfusers');
		
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
		if ($action = $this->input->post('delete'))
		{
			if ($action == 'Delete')
			{
				$checked = $this->input->post('checked');

				if (is_array($checked) && count($checked))
				{
					$result = FALSE;
					foreach ($checked as $pid)
					{
						$result = $this->gfusers_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('gfusers_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('gfusers_delete_failure') . $this->gfusers_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('gfusers_delete_error') . $this->gfusers_model->error, 'error');
				}
			}
		}

		$records = $this->gfusers_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage gfusers');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a gfusers object.
	*/
	public function create()
	{
		$this->auth->restrict('Gfusers.Settings.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_gfusers())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'gfusers');

				Template::set_message(lang('gfusers_create_success'), 'success');
				Template::redirect(SITE_AREA .'/settings/gfusers');
			}
			else
			{
				Template::set_message(lang('gfusers_create_failure') . $this->gfusers_model->error, 'error');
			}
		}
		Assets::add_module_js('gfusers', 'gfusers.js');

		Template::set('toolbar_title', lang('gfusers_create') . ' gfusers');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of gfusers data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('gfusers_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/gfusers');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Gfusers.Settings.Edit');

			if ($this->save_gfusers('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'gfusers');

				Template::set_message(lang('gfusers_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('gfusers_edit_failure') . $this->gfusers_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Gfusers.Settings.Delete');

			if ($this->gfusers_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'gfusers');

				Template::set_message(lang('gfusers_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/gfusers');
			} else
			{
				Template::set_message(lang('gfusers_delete_failure') . $this->gfusers_model->error, 'error');
			}
		}
		Template::set('gfusers', $this->gfusers_model->find($id));
		Assets::add_module_js('gfusers', 'gfusers.js');

		Template::set('toolbar_title', lang('gfusers_edit') . ' gfusers');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_gfusers()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_gfusers($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('gfusers_user_id','User ID','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_name','Name','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_last_name','Last Name','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_comp_name','Company Name','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_comp_description','Company Description','trim|xss_clean');
		$this->form_validation->set_rules('gfusers_comp_category','Company Category','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_comp_email','Company Email','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_website','Website','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_address','Address','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_city','City','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_state','State','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_zip','Zip','trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('gfusers_country','Country','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_phone_1','Telephone 1','trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('gfusers_phone_2','Telephone 2','trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('gfusers_fax','Fax','trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('gfusers_is_farmer','Is Farmer','trim|xss_clean|max_length[1]');
		$this->form_validation->set_rules('gfusers_is_company','Is Company','trim|xss_clean|max_length[1]');
		$this->form_validation->set_rules('gfusers_is_user','Is User','trim|xss_clean|max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['user_id']        = $this->input->post('gfusers_user_id');
		$data['name']        = $this->input->post('gfusers_name');
		$data['last_name']        = $this->input->post('gfusers_last_name');
		$data['comp_name']        = $this->input->post('gfusers_comp_name');
		$data['comp_description']        = $this->input->post('gfusers_comp_description');
		$data['comp_category']        = $this->input->post('gfusers_comp_category');
		$data['comp_email']        = $this->input->post('gfusers_comp_email');
		$data['website']        = $this->input->post('gfusers_website');
		$data['address']        = $this->input->post('gfusers_address');
		$data['city']        = $this->input->post('gfusers_city');
		$data['state']        = $this->input->post('gfusers_state');
		$data['zip']        = $this->input->post('gfusers_zip');
		$data['country']        = $this->input->post('gfusers_country');
		$data['phone_1']        = $this->input->post('gfusers_phone_1');
		$data['phone_2']        = $this->input->post('gfusers_phone_2');
		$data['fax']        = $this->input->post('gfusers_fax');
		$data['is_farmer']        = $this->input->post('gfusers_is_farmer');
		$data['is_company']        = $this->input->post('gfusers_is_company');
		$data['is_user']        = $this->input->post('gfusers_is_user');

		if ($type == 'insert')
		{
			$id = $this->gfusers_model->insert($data);

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
			$return = $this->gfusers_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}