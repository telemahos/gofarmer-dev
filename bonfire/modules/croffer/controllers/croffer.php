<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class croffer extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('croffer_model', null, true);
		$this->lang->load('croffer');

		// Load the crop MODULE
		$this->load->module('crop');
		// Load the messages MODULE
		$this->load->module('messages');

		// Custom MODULE javascript
		Assets::add_module_js('croffer', 'croffer.js');

		if ($this->auth->is_logged_in() === TRUE)
		{
			// Get current user Language
			$mylang = $this->current_user->language;
			Template::set('mylang', $mylang);
			if($this->current_user->language == "greek") {
				Assets::add_js('jquery.ui.datepicker-el.js');
			} 
		}
	
		Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
		Assets::add_js('jquery-ui-1.8.13.min.js');
		Assets::add_css('jquery-ui-timepicker.css');
		Assets::add_js('jquery-ui-timepicker-addon.js'); 
		
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		$records = $this->croffer_model->find_all();

		Template::set('records', $records);
		Template::set_view('croffer/croffer/index');
		Template::render();
	}

	//--------------------------------------------------------------------

	/*
		Method: create()

		Creates a croffer object.
	*/
	public function create()
	{
		//$this->auth->restrict('Croffer.Content.Create');
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_croffer())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('croffer_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'croffer');

				Template::set_message(lang('croffer_create_success'), 'success');
				// Template::set_view('croffer/croffer/view_add_croffer');
				Template::redirect('croffer/croffer/create');
			}
			else
			{
				Template::set_message(lang('croffer_create_failure') . $this->croffer_model->error, 'error');
			}
		}
		Assets::add_module_js('croffer', 'croffer.js');

		// Loading data from crop module
		$user_crops_data = $this->crop->show_users_crop_list_raw($this->current_user->id);
		
		Template::set('user_crops_data', $user_crops_data);

		Template::set('toolbar_title', lang('croffer_create') . ' croffer');
		Template::set_view('croffer/croffer/view_add_croffer');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_croffer()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_croffer($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		// $this->form_validation->set_rules('croffer_user_id','User Id','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('croffer_crop_id','Crop Id','trim|xss_clean|max_length[20]');
		// $this->form_validation->set_rules('croffer_variety_id','Variety Id','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('croffer_quantity','Quantity','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('croffer_quantity_type_id','Quantity Type Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('croffer_packaging_id','Packaging Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('croffer_quality_id','Quality Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('croffer_price','Price','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('croffer_release_date','Release Date','trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('croffer_comment','Comment','trim|xss_clean');
		$this->form_validation->set_rules('croffer_image','Image','trim|xss_clean|max_length[250]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want

		// Test:
		//echo $this->input->post('croffer_crop_id');
		
		$data = array(); 
		// $data['user_id']        = $this->input->post('croffer_user_id');
		$data['user_id']        = $this->current_user->id; 
		$data['crop_id']        = $this->input->post('croffer_crop_id');
		/*GET THE VARIETY ID FROM THE DB*/
		$the_variety_id = $this->crop_model->find_by('crop',$this->input->post('croffer_crop_id'));
		// $the_variety_id = $this->crop_model->find_by('id',$this->input->post('the_crop_id'));
		$variety_id = $the_variety_id->variety;
		
		$data['variety_id']        =  $variety_id;
		$data['quantity']        = $this->input->post('croffer_quantity');
		$data['quantity_type_id']        = $this->input->post('croffer_quantity_type_id');
		$data['packaging_id']        = $this->input->post('croffer_packaging_id');
		$data['quality_id']        = $this->input->post('croffer_quality_id');
		$data['price']        = $this->input->post('croffer_price');
		$data['price_per']        = $this->input->post('croffer_price_per');
		$data['release_date']        = $this->input->post('croffer_release_date') ? $this->input->post('croffer_release_date') : '0000-00-00 00:00:00';
		$data['comment']        = $this->input->post('croffer_comment');
		// $data['image']        = $this->input->post('croffer_image');
		$data['image']        = 0;

		if ($type == 'insert')
		{
			$id = $this->croffer_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->croffer_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------

	/**
	 * Method get_crop_id()
	 * 
	 * Get IDs from DB (CROP and VARIETY) while geting aν AJAX Request.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function get_crop_id()
	{
		if (isset($_POST['data']))
		{
			$crop_id =$this->crop_model->find_by('id',$_POST['data']);
			echo $crop_id->crop;
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Method get_crop_id()
	 * 
	 * Get IDs from DB (CROP and VARIETY) while geting aν AJAX Request.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function get_user_offer()
	{
		// get the current user crops
		// $user_offer = $this->croffer_model->find_all_by("user_id",$this->current_user->id);
		$user_offer = $this->croffer_model->get_user_croffers($this->current_user->id);
		return $user_offer;
		// Template::set('user_offer', $user_offer);

	}

}