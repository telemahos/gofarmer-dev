<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Authenticated_Controller  { 

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		/*$this->load->library('form_validation');
		$this->lang->load('starter');*/
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{
		Template::set_view('starter/home/index');
		Template::render();
	}

}