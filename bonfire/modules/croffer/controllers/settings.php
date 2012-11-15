<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Croffer.Settings.View');
		$this->load->model('croffer_model', null, true);
		$this->lang->load('croffer');
		
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
			Assets::add_css('jquery-ui-timepicker.css');
			Assets::add_js('jquery-ui-timepicker-addon.js');
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
						$result = $this->croffer_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('croffer_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('croffer_delete_failure') . $this->croffer_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('croffer_delete_error') . $this->croffer_model->error, 'error');
				}
			}
		}

		$records = $this->croffer_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage croffer');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a croffer object.
	*/
	public function create()
	{
		$this->auth->restrict('Croffer.Settings.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_croffer())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('croffer_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'croffer');

				Template::set_message(lang('croffer_create_success'), 'success');
				Template::redirect(SITE_AREA .'/settings/croffer');
			}
			else
			{
				Template::set_message(lang('croffer_create_failure') . $this->croffer_model->error, 'error');
			}
		}
		Assets::add_module_js('croffer', 'croffer.js');

		Template::set('toolbar_title', lang('croffer_create') . ' croffer');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of croffer data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('croffer_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/croffer');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Croffer.Settings.Edit');

			if ($this->save_croffer('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('croffer_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'croffer');

				Template::set_message(lang('croffer_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('croffer_edit_failure') . $this->croffer_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Croffer.Settings.Delete');

			if ($this->croffer_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('croffer_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'croffer');

				Template::set_message(lang('croffer_delete_success'), 'success');

				redirect(SITE_AREA .'/settings/croffer');
			} else
			{
				Template::set_message(lang('croffer_delete_failure') . $this->croffer_model->error, 'error');
			}
		}
		Template::set('croffer', $this->croffer_model->find($id));
		Assets::add_module_js('croffer', 'croffer.js');

		Template::set('toolbar_title', lang('croffer_edit') . ' croffer');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_croffer()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_croffer($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('croffer_user_id','User Id','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('croffer_crop_id','Crop Id','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('croffer_variety_id','Variety Id','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('croffer_quantity','Quantity','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('croffer_quantity_type_id','Quantity Type Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('croffer_packaging_id','Packaging Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('croffer_quality_id','Quality Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('croffer_price','Price','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('croffer_release_date','Release Date','trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('croffer_comment','Comment','trim|xss_clean');
		$this->form_validation->set_rules('croffer_image','Image','trim|xss_clean|max_length[250]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['user_id']        = $this->input->post('croffer_user_id');
		$data['crop_id']        = $this->input->post('croffer_crop_id');
		$data['variety_id']        = $this->input->post('croffer_variety_id');
		$data['quantity']        = $this->input->post('croffer_quantity');
		$data['quantity_type_id']        = $this->input->post('croffer_quantity_type_id');
		$data['packaging_id']        = $this->input->post('croffer_packaging_id');
		$data['quality_id']        = $this->input->post('croffer_quality_id');
		$data['price']        = $this->input->post('croffer_price');
		$data['release_date']        = $this->input->post('croffer_release_date') ? $this->input->post('croffer_release_date') : '0000-00-00 00:00:00';
		$data['comment']        = $this->input->post('croffer_comment');
		$data['image']        = $this->input->post('croffer_image');

		if ($type == 'insert')
		{
			$id = $this->croffer_model->insert($data);

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
			$return = $this->croffer_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}