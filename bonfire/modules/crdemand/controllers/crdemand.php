<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class crdemand extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('crdemand_model', null, true);
		$this->lang->load('crdemand');

		// Load the crop MODULE
		$this->load->module('crop');
		// Load the messages MODULE
		$this->load->module('messages');

		if ($this->auth->is_logged_in() === TRUE)
		{
			// Get current user Language
			$mylang = $this->current_user->language;
			Template::set('mylang', $mylang);
			if($this->current_user->language == "greek") {
				Assets::add_js('jquery.ui.datepicker-el.js');
			} 
		}
			
			Assets::add_module_js('crdemand', 'bootstrap-typeahead.js');
			Assets::add_module_js('crdemand', 'crdemand.js');
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		$records = $this->crdemand_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------

	/*
		Method: get_crop_list()

		Displays TYPEAHEAD of the crop list.
	*/
	public function get_crop_list()
	{

		if (isset($_POST['the_data']))
		{
			$typeahead = $_POST['the_data'];
			$crop_list = $this->crop->get_crop_list_raw($typeahead);
			if($this->current_user->language == "greek") {
				foreach ($crop_list as $key => $value) {
					$res[] = $value['crops_gr'];
					$res[] = $value['crops_en']; // both languages
				}
			} 
			else
			{
				foreach ($crop_list as $key => $value) {
					$res[] = $value['crops_en'];
					$res[] = $value['crops_gr']; // both languages
				}
			}
			
			 $this->output
			 		->set_content_type('application/json')
			 		->set_output( json_encode($res));
		}
	}

	//--------------------------------------------------------------------

	/*
		Method: create()

		Creates a crdemand object.
	*/
	public function create()
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_crdemand())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crdemand_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'crdemand');

				Template::set_message(lang('crdemand_create_success'), 'success');
				Template::redirect('crdemand/crdemand/create');
			}
			else
			{
				Template::set_message(lang('crdemand_create_failure') . $this->crdemand_model->error, 'error');
			}
		}
		//Assets::add_module_js('crdemand', 'crdemand.js');

		$this->load->model('crop_model');
		$crop_crops = $this->crop_model->get_crop_list();
		//print_r($crop_crops);
		Template::set('crop_crops', $crop_crops);

		Template::set('toolbar_title', lang('crdemand_create') . ' crdemand');
		Template::set_view('crdemand/crdemand/create');
		Template::render();
	}// end of create.

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_crdemand()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_crdemand($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		// $this->form_validation->set_rules('crdemand_user_id','User Id','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('crop_id','Crop Id','required|trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('variety_id','Variety Id','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('quantity','Quantity','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('quantity_type_id','Quantity Type Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('packaging_id','Packaging Id','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('price','Price','trim|xss_clean|max_length[11]');
		$this->form_validation->set_rules('price_per','Price Per','trim|xss_clean|max_length[2]');
		$this->form_validation->set_rules('release_date','Release Date','trim|xss_clean');
		$this->form_validation->set_rules('comment','Comment','trim|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		// $data['user_id']        = $this->input->post('crdemand_user_id');
		$data['user_id']        = $this->current_user->id;
		$data['crop_id']        = $this->input->post('crop_id');
		$data['variety_id']        = $this->input->post('variety_id');
		$data['quantity']        = $this->input->post('quantity');
		$data['quantity_type_id']        = $this->input->post('quantity_type_id');
		$data['packaging_id']        = $this->input->post('packaging_id');
		$data['price']        = $this->input->post('price');
		$data['price_per']        = $this->input->post('price_per');
		$data['release_date']        = $this->input->post('release_date') ? $this->input->post('crdemand_release_date') : '0000-00-00';
		$data['comment']        = $this->input->post('comment');

		if ($type == 'insert')
		{
			$id = $this->crdemand_model->insert($data);

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
			$return = $this->crdemand_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------


}