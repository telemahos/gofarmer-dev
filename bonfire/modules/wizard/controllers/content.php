<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Wizard.Content.View');
		$this->load->model('wizard_model', null, true);
		$this->lang->load('wizard');
		
		Template::set_block('sub_nav', 'content/_sub_nav');
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
					$result = $this->wizard_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('wizard_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('wizard_delete_failure') . $this->wizard_model->error, 'error');
				}
			}
		}

		$records = $this->wizard_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage wizard');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a wizard object.
	*/
	public function create()
	{
		$this->auth->restrict('Wizard.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_wizard())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('wizard_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'wizard');

				Template::set_message(lang('wizard_create_success'), 'success');
				redirect(SITE_AREA .'/content/wizard');
			}
			else
			{
				Template::set_message(lang('wizard_create_failure') . $this->wizard_model->error, 'error');
			}
		}
		Assets::add_module_js('wizard', 'wizard.js');

		Template::set('toolbar_title', lang('wizard_create') . ' wizard');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of wizard data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('wizard_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/wizard');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Wizard.Content.Edit');

			if ($this->save_wizard('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('wizard_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'wizard');

				Template::set_message(lang('wizard_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('wizard_edit_failure') . $this->wizard_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Wizard.Content.Delete');

			if ($this->wizard_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('wizard_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'wizard');

				Template::set_message(lang('wizard_delete_success'), 'success');

				redirect(SITE_AREA .'/content/wizard');
			} else
			{
				Template::set_message(lang('wizard_delete_failure') . $this->wizard_model->error, 'error');
			}
		}
		Template::set('wizard', $this->wizard_model->find($id));
		Assets::add_module_js('wizard', 'wizard.js');

		Template::set('toolbar_title', lang('wizard_edit') . ' wizard');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_wizard()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_wizard($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('wizard_user_id','User Id','required|unique[bf_wizard.user_id,bf_wizard.id]|max_length[20]');
		$this->form_validation->set_rules('wizard_completed','Completed','max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['user_id']        = $this->input->post('wizard_user_id');
		$data['completed']        = $this->input->post('wizard_completed');

		if ($type == 'insert')
		{
			$id = $this->wizard_model->insert($data);

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
			$return = $this->wizard_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}