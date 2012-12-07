<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class wizard_guests extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		
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
		Assets::add_css( 'chosen.css' ); 
		Assets::add_js( 'chosen.jquery.min.js' );
		$inline  = '$(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true});';
		Assets::add_js( $inline, 'inline' );

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_guests/view_guest_two');
		$this->load->view('wizard/wizard/footer');
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_guests_three()

		Displays a list of form data.
	*/
	public function wizard_guests_three()
	{
		//Add JCrop Library
		Assets::clear_cache();
		Assets::add_css( 'jquery.Jcrop.min.css' ); 
		Assets::add_js( 'jquery.Jcrop.min.js' );
		Assets::add_module_js('wizard','jcrop_js.js' );

		// Save users personla data
		if ($this->input->post('submit'))
		{
			$targ_w = 260;
			$targ_h = 220;
			$jpeg_quality = 60;
			echo "test1";
			// $src = base_url('assets/images/3.jpg');
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);
			echo "test2";
			header('Content-type: image/jpeg');
			// $data['pics'] = imagejpeg($dst_r,null,$jpeg_quality);
			$data['pics'] = "kostas22";	

			$this->load->view('wizard/wizard/header');
			$this->load->view('wizard/wizard_guests/view_guest_two', $data);
			$this->load->view('wizard/wizard/footer');

			// exit;
		}


		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_guests/view_guest_three');
		$this->load->view('wizard/wizard/footer');
	}

}