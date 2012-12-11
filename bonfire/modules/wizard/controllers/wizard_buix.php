<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class wizard_buix extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

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
		Assets::add_css( 'chosen.css' ); 
		Assets::add_js( 'chosen.jquery.min.js' );
		$inline  = '$(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true});';
		Assets::add_js( $inline, 'inline' );
		// $records = $this->wizard_model->find_all();
		// $this->wizard_farmer();

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_buix/view_buix_one');
		$this->load->view('wizard/wizard/footer');
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_buix_two()

		Displays a list of form data.
	*/
	public function wizard_buix_two()
	{
		Assets::add_css( 'chosen.css' ); 
		Assets::add_js( 'chosen.jquery.min.js' );
		$inline  = '$(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true});';
		Assets::add_js( $inline, 'inline' );

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_buix/view_buix_two');
		$this->load->view('wizard/wizard/footer');
	}

	//--------------------------------------------------------------------

	/*
		Method: wizard_buix_three()

		Displays a list of form data.
	*/
	public function wizard_buix_three()
	{
		// Load the crdemand MODULE
		$this->load->module('crdemand');
		$this->load->model('crdemand_model', null, true);
		$this->lang->load('crdemand');


		Assets::add_css( 'chosen.css' ); 
		Assets::add_js( 'chosen.jquery.min.js' );
		$inline  = '$(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true});';
		Assets::add_js( $inline, 'inline' );

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_buix/view_buix_three');
		$this->load->view('wizard/wizard/footer');
	}

	//--------------------------------------------------------------------


}