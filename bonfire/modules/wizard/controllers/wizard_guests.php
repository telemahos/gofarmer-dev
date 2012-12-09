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

			// $targ_w = 270;
			// $targ_h = 202;
			$targ_w = 260;
			$targ_h = 195;
			// $targ_w = $targ_h = 150;
			$jpeg_quality = 90;
			$src = base_url('assets/images/4.jpg');
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
		if ($this->input->post('redirect'))
		{
			$original_image = $this->wizard_model->add_user_temp_image($this->current_user->id);
			redirect('/wizard/wizard_guests/wizard_crop_image');
		}
		else {
			// Template::set_message('H φωτογραφία δεν αποθηκεύτηκε', 'error');
		}

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_guests/view_add_image');
		$this->load->view('wizard/wizard/footer');
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_guests_two()

		Displays a list of form data.
	*/
	public function wizard_redirect_to_crop_image()
	{
		// Add new user image
		
	}

	//--------------------------------------------------------------------


	/*
		Method: wizard_crop_image()

		Displays a list of form data.
	*/
	public function wizard_crop_image()
	{
		
		//Add JCrop Library
		Assets::clear_cache();
		Assets::add_css( 'jquery.Jcrop.min.css' ); 
		Assets::add_js( 'jquery.Jcrop.min.js' );
		Assets::add_module_js('wizard','jcrop_js.js' );

		// Loading gfusers module
		$this->load->module('gfusers');
		$this->load->model('gfusers_model', null, true);
		$this->lang->load('gfusers');

		// Geting the user image
		$gfusers = $this->gfusers_model->find_by("user_id",$this->current_user->id);

		// Add new user image
		if ($this->input->post('submit'))
		{
			$user_img = $gfusers->image;
			$targ_w = 260;
			$targ_h = 195;
			$jpeg_quality = 70;
			$src = base_url('assets/images/temp_img' . '/'. $user_img);
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$this->input->post('x'),$this->input->post('y'),$targ_w,$targ_h,$this->input->post('w'),$this->input->post('h'));
			imagejpeg($dst_r, 'assets/images/temp_img' .'/'. $gfusers->image , $jpeg_quality );
			$this->crop_thumb($user_img);
			redirect("/");
		}

		$data['gfusers'] =  $gfusers;

		$this->load->view('wizard/wizard/header');
		$this->load->view('wizard/wizard_guests/view_crop_image', $data);
		$this->load->view('wizard/wizard/footer');
	}

	public function crop_thumb($user_img)
	{
		//Add JCrop Library
		Assets::clear_cache();
		Assets::add_css( 'jquery.Jcrop.min.css' ); 
		Assets::add_js( 'jquery.Jcrop.min.js' );
		Assets::add_module_js('wizard','jcrop_js.js' );
		
		$targ_w = 64;
		$targ_h = 48;
		$jpeg_quality = 70;
		$src = base_url('assets/images/temp_img' . '/'. $user_img);
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		imagecopyresampled($dst_r,$img_r,0,0,$this->input->post('x'),$this->input->post('y'),$targ_w,$targ_h,$this->input->post('w'),$this->input->post('h'));
		imagejpeg($dst_r, 'assets/images/temp_img/thumbs' . '/'. $user_img, $jpeg_quality );
		return;
	}


}