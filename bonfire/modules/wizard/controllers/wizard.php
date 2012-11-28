<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class wizard extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('wizard_model', null, true);
		$this->lang->load('wizard');
		
		Assets::add_css( 'chosen.css' ); 
		Assets::add_js( 'chosen.jquery.min.js' );
		$inline  = '$(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true});';
		Assets::add_js( $inline, 'inline' );
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// $records = $this->wizard_model->find_all();
		$this->wizard_farmer();

		// Template::set('records', $records);
		// Template::render();
	}

	//--------------------------------------------------------------------												


	/*
		Method: wizard_farmer()

		Displays a list of form data.
	*/
	public function wizard_farmer()
	{
		$this->load->module('gfusers');
		$this->load->model('gfusers_model', null, true);
		$this->lang->load('gfusers');

		// Save users personla data
		if ($this->input->post('save'))
		{
			// Check to see if users has already add personal data.
			// if NO, then data insert
			// else, data update
			$personal_data = $this->gfusers_model->find_by('user_id',$this->current_user->id);
			if (empty($personal_data))
			{
				// insert personal data
				if ($insert_id = $this->gfusers->save_user_personal_data())
				{
					// Log the activity
					$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'gfusers');

					// Template::set_message(lang('gfusers_create_success'), 'success');
					// Template::redirect('/wizard/wizard/wizard_farmer_two');
					redirect('/wizard/wizard/wizard_farmer_two');
				}
				else
				{
					// Template::set_message(lang('gfusers_create_failure') . $this->gfusers_model->error, 'error');
				}
			}
			else
			{
				// update personal data
				$personal_data_id = $personal_data->id;
				if (empty($personal_data_id))
				{
					Template::set_message(lang('gfusers_invalid_id'), 'error');
					// Template::redirect('/gfusers/personal_data');
				}

				if ($this->gfusers->save_user_personal_data('update', $personal_data_id))
				{
					// Log the activity
					$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_edit_record').': ' . $personal_data_id . ' : ' . $this->input->ip_address(), 'gfusers');
					Template::set_message(lang('gfusers_edit_success'), 'success');
				}
				else
				{
					Template::set_message(lang('gfusers_edit_failure') . $this->gfusers_model->error, 'error');
				}

				Template::set_message(lang('gfusers_create_success'), 'success');
				// Template::redirect('/gfusers/personal_data');
				redirect('/wizard/wizard/wizard_farmer_two');
			}

		}


		// get the current user information
		$data['gfusers'] = $this->gfusers_model->find_by("user_id",$this->current_user->id);
		
		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard/view_farmer_one', $data);
		$this->load->view('wizard/wizard/footer');
		// Template::set_view('wizard/wizard/view_farmer_one');
		// Template::render();
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_farmer()

		Displays a list of form data.
	*/
	public function wizard_farmer_two()
	{
		$this->load->module('crop');
		$this->load->model('crop_model', null, true);
		$this->lang->load('crop');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->crop->save_crop())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crop_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'crop');

				Template::set_message(lang('crop_create_success'), 'success');
				// Template::redirect($this->uri->uri_string());
				redirect('wizard/wizard/wizard_farmer_three');
			}
			else
			{
				Template::set_message(lang('crop_create_failure') . $this->crop_model->error, 'error');
			}
		}

		Assets::add_module_js('wizard', 'crop_js.js');
		$data['crop_crops'] = $this->crop_model->get_crop_list();
		$data['mylang'] = $this->current_user->language;
		
		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard/view_farmer_two',$data);
		$this->load->view('wizard/wizard/footer');
		/*Template::set_view('wizard/wizard/view_farmer_two');
		Template::render();*/
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_farmer()

		Displays a list of form data.
	*/
	public function wizard_farmer_three()
	{
		$this->load->module('croffer');
		$this->load->model('croffer_model', null, true);
		$this->lang->load('croffer');
		
		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard/view_farmer_three');
		$this->load->view('wizard/wizard/footer');
		/*Template::set_view('wizard/wizard/view_farmer_three');
		Template::render();*/
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_company()

		Displays a list of form data.
	*/
	public function wizard_company()
	{
		Template::set_view('wizard/wizard/view_welcome');
		Template::render();
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_simple_user()

		Displays a list of form data.
	*/
	public function wizard_simple_user()
	{

		Template::set_view('wizard/wizard/view_welcome');
		Template::render();
	}


}