<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class my_crops extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('crop_model', null, true);
		$this->lang->load('crop');

		// Load the messages MODULE
		$this->load->module('messages');
		
			//Assets::add_js(Template::theme_url('js/editors/ckeditor/ckeditor.js'));
			// just a javascript call for my js script
			Assets::add_module_js('crop', 'crop.js');
	}

	//--------------------------------------------------------------------

	/*
		Method: index()

		Displays a list all crops from the current user.
	*/
	public function index()
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		// get the current user crops
		$records = $this->crop_model->get_user_crops($this->current_user->id);
		// print_r($records);
		Template::set('records', $records);

		Template::set_view('crop/crop/view_my_crops');
		Template::render();

	}//end index()

	//--------------------------------------------------------------------

	/**
	 * Allows a user to edit their own crops.
	 *
	 * @access public
	 * @param $crop_id is the id ID of a specific Crop entry in the DB
	 * @return void
	 */
	public function edit_my_crop($user_id, $crop_id)
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		// get the current user crops
		$crop = $this->crop_model->find_all_by("user_id",$this->current_user->id);

		Template::set('crop', $crop);

		Template::set_view('crop/crop/view_edit_my_crop');
		Template::render();

	}//end show_users_crop()
	

}