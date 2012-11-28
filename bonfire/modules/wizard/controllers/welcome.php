<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('wizard_model', null, true);
		$this->lang->load('wizard');

		// Load the messages MODULE
		// $this->load->module('messages');
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{
		// Are users even allowed to register?
		if (!$this->settings_lib->item('auth.allow_register'))
		{
			Template::set_message(lang('us_register_disabled'), 'error');
			Template::redirect('/');
		}
		// get the completed wizard user information
		$user = $this->wizard_model->find_by("user_id",$this->current_user->id);
		// Template::set('user', $user);

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard/view_welcome', $user);
		$this->load->view('wizard/wizard/footer');
		// Template::set_view('wizard/wizard/view_welcome');
		// Template::render();
	}
}