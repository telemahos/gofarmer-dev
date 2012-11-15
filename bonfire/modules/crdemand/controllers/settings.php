<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Crdemand.Settings.View');
		$this->load->model('crdemand_model', null, true);
		$this->lang->load('crdemand');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
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
					$result = $this->crdemand_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('crdemand_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('crdemand_delete_failure') . $this->crdemand_model->error, 'error');
				}
			}
		}

		$records = $this->crdemand_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage crdemand');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a crdemand object.
	*/
	public function create()
	{
		$this->auth->restrict('Crdemand.Settings.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_crdemand())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crdemand_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'crdemand');

				Template::set_message(lang('crdemand_create_success'), 'success');
				Template::redirect(SITE_AREA .'/settings/crdemand');
			}
			else
			{
				Template::set_message(lang('crdemand_create_failure') . $this->crdemand_model->error, 'error');
			}
		}
		Assets::add_module_js('crdemand', 'crdemand.js');

		Template::set('toolbar_title', lang('crdemand_create') . ' crdemand');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of crdemand data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('crdemand_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/crdemand');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Crdemand.Settings.Edit');

			if ($this->save_crdemand('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crdemand_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'crdemand');

				Template::set_message(lang('crdemand_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('crdemand_edit_failure') . $this->crdemand_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Crdemand.Settings.Delete');

			if ($this->crdemand_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crdemand_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'crdemand');

				Template::set_message(lang('crdemand_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/crdemand');
			} else
			{
				Template::set_message(lang('crdemand_delete_failure') . $this->crdemand_model->error, 'error');
			}
		}
		Template::set('crdemand', $this->crdemand_model->find($id));
		Assets::add_module_js('crdemand', 'crdemand.js');

		Template::set('toolbar_title', lang('crdemand_edit') . ' crdemand');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_crdemand()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_crdemand($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('crdemand_user_id','User Id','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('crdemand_crop_id','Crop Id','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('crdemand_variety_id','Variety Id','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('crdemand_quantity','Quantity','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('crdemand_quantity_type_id','Quantity Type Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('crdemand_packaging_id','Packaging Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('crdemand_price','Price','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('crdemand_price_per','Price Per','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('crdemand_release_date','Release Date','trim|xss_clean');
		$this->form_validation->set_rules('crdemand_comment','Comment','trim|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['user_id']        = $this->input->post('crdemand_user_id');
		$data['crop_id']        = $this->input->post('crdemand_crop_id');
		$data['variety_id']        = $this->input->post('crdemand_variety_id');
		$data['quantity']        = $this->input->post('crdemand_quantity');
		$data['quantity_type_id']        = $this->input->post('crdemand_quantity_type_id');
		$data['packaging_id']        = $this->input->post('crdemand_packaging_id');
		$data['price']        = $this->input->post('crdemand_price');
		$data['price_per']        = $this->input->post('crdemand_price_per');
		$data['release_date']        = $this->input->post('crdemand_release_date') ? $this->input->post('crdemand_release_date') : '0000-00-00';
		$data['comment']        = $this->input->post('crdemand_comment');

		if ($type == 'insert')
		{
			$id = $this->crdemand_model->insert($data);

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
			$return = $this->crdemand_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}