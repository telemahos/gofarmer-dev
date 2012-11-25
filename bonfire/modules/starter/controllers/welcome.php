<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->lang->load('starter');

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


		Template::set_view('starter/starter/view_welcome');
		/*Template::set_view('starter/home/index');*/
		Template::render();
	}
}