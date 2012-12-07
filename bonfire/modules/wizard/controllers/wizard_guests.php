<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class wizard_guests extends Authenticated_Controller {

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

			// if($image->imageok) {
			//     $image->setJpegQuality('100');
			//     $image->setCrop($this->input->post('x'), $this->input->post('y'), $this->input->post('w'), $this->input->post('h'));
			//     $image->resize(270);
			//     // $image->save('/path/to/new/image.jpg');
			//     $image->save(realpath(APPPATH . '../../assets/images/images_test/3_1.jpg'));
			//     Template::set_message('file uploaded73', 'success');
			// } else {
			//    //Throw error as there was a problem loading the image
			// 	Template::set_message('error file not uploaded74', 'error');
			// }

			$targ_w = 270;
			$targ_h = 202;
			$jpeg_quality = 70;
			$src = base_url('assets/images/3.jpg');
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$this->input->post('x'),$this->input->post('y'),
			$targ_w,$targ_h,$this->input->post('w'),$this->input->post('h'));
			// header('Content-type: image/jpeg');
			$data['pics'] = imagejpeg($dst_r, 'assets/images/3_1.jpg', $jpeg_quality );
			// $data['pics'] = "kostas22";	

			// exit;
		}


		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_guests/view_guest_three');
		$this->load->view('wizard/wizard/footer');
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_guests_two()

		Displays a list of form data.
	*/
	public function wizard_add_image()
	{
		
		// Add new user image
		if ($this->input->post('submit'))
		{
			$this->wizard_model->add_user_temp_image($this->current_user->id);
			
			$this->load->view('wizard/wizard/header');
			$this->load->view('wizard/wizard_guests/view_guest_three');
			$this->load->view('wizard/wizard/footer');
		}

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_guests/view_add_image');
		$this->load->view('wizard/wizard/footer');
	}

}