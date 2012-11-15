<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Crop.Settings.View');
		$this->load->model('crop_model', null, true);
		$this->lang->load('crop');
		
			Assets::add_js(Template::theme_url('js/editors/ckeditor/ckeditor.js'));
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
						$result = $this->crop_model->delete($pid);
					}

					if ($result)
					{
						Template::set_message(count($checked) .' '. lang('crop_delete_success'), 'success');
					}
					else
					{
						Template::set_message(lang('crop_delete_failure') . $this->crop_model->error, 'error');
					}
				}
				else
				{
					Template::set_message(lang('crop_delete_error') . $this->crop_model->error, 'error');
				}
			}
		}

		$records = $this->crop_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage crop');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a crop object.
	*/
	public function create()
	{
		$this->auth->restrict('Crop.Settings.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_crop())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crop_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'crop');

				Template::set_message(lang('crop_create_success'), 'success');
				Template::redirect(SITE_AREA .'/settings/crop');
			}
			else
			{
				Template::set_message(lang('crop_create_failure') . $this->crop_model->error, 'error');
			}
		}
		Assets::add_module_js('crop', 'crop.js');

		Template::set('toolbar_title', lang('crop_create') . ' crop');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of crop data.
	*/
	public function edit()
	{
		$this->auth->restrict('Crop.Settings.Edit');

		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('crop_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/crop');
		}

		if ($this->input->post('submit'))
		{
			if ($this->save_crop('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crop_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'crop');

				Template::set_message(lang('crop_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('crop_edit_failure') . $this->crop_model->error, 'error');
			}
		}

		Template::set('crop', $this->crop_model->find($id));
		Assets::add_module_js('crop', 'crop.js');

		Template::set('toolbar_title', lang('crop_edit') . ' crop');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: delete()

		Allows deleting of crop data.
	*/
	public function delete()
	{
		$this->auth->restrict('Crop.Settings.Delete');

		$id = $this->uri->segment(5);

		if (!empty($id))
		{

			if ($this->crop_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crop_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'crop');

				Template::set_message(lang('crop_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('crop_delete_failure') . $this->crop_model->error, 'error');
			}
		}

		redirect(SITE_AREA .'/settings/crop');
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_crop()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_crop($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('crop_user_id','User ID','required|trim|xss_clean|is_numeric|max_length[10]');
		$this->form_validation->set_rules('crop_crop','Crop','required|trim|xss_clean|alpha_extra|max_length[250]');
		$this->form_validation->set_rules('crop_variety','Variety','trim|xss_clean|alpha_extra|max_length[255]');
		$this->form_validation->set_rules('crop_hectar','Hectar','trim|xss_clean|integer|max_length[10]');
		$this->form_validation->set_rules('crop_certification','Certification','trim|xss_clean|alpha_extra|max_length[255]');
		$this->form_validation->set_rules('crop_conventional_crops','Conventional Crops','trim|xss_clean|alpha_extra|max_length[255]');
		$this->form_validation->set_rules('crop_integrated_crop','Integrated Crop','trim|xss_clean|alpha_extra|max_length[255]');
		$this->form_validation->set_rules('crop_organic','Organic','trim|xss_clean|alpha_extra|max_length[255]');
		$this->form_validation->set_rules('crop_comment','Comment','trim|xss_clean|alpha_extra|max_length[500]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['user_id']        = $this->input->post('crop_user_id');
		$data['crop']        = $this->input->post('crop_crop');
		$data['variety']        = $this->input->post('crop_variety');
		$data['hectar']        = $this->input->post('crop_hectar');
		$data['certification']        = $this->input->post('crop_certification');
		$data['conventional_crops']        = $this->input->post('crop_conventional_crops');
		$data['integrated_crop']        = $this->input->post('crop_integrated_crop');
		$data['organic']        = $this->input->post('crop_organic');
		$data['comment']        = $this->input->post('crop_comment');

		if ($type == 'insert')
		{
			$id = $this->crop_model->insert($data);

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
			$return = $this->crop_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}