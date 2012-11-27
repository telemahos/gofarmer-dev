<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class wizard extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('wizard_model', null, true);
		$this->lang->load('wizard');
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		$records = $this->wizard_model->find_all();

		Template::set('records', $records);
		Template::render();
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
		
		Template::set_view('wizard/wizard/view_farmer_one');
		Template::render();
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
		
		Template::set_view('wizard/wizard/view_farmer_two');
		Template::render();
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
		
		Template::set_view('wizard/wizard/view_farmer_three');
		Template::render();
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