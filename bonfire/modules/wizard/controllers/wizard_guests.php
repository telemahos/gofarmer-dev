<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class wizard_guests extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

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
		// $this->wizard_farmer();

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_guests/view_guest_one');
		$this->load->view('wizard/wizard/footer');
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_guests_two()

		Displays a list of form data.
	*/
	public function wizard_guests_two()
	{

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_guests/view_guest_two');
		$this->load->view('wizard/wizard/footer');
	}

}