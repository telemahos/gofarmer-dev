<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class crop extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('crop_model', null, true);
		$this->lang->load('crop');

		// Load the messages MODULE
		$this->load->module('messages');
		
		//Assets::add_js(Template::theme_url('js/editors/ckeditor/ckeditor.js'));
		// just a javascript call for my js script
		Assets::add_module_js('crop', 'crop.js');

		if ($this->auth->is_logged_in() === TRUE)
		{
			// Get current user Language
			$mylang = $this->current_user->language;
			Template::set('mylang', $mylang);
		}
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

		$records = $this->crop_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------

	/**
	 * Allows a user to show their own crops.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function show_users_crop()
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		// get the current user crops
		$crop = $this->crop_model->find_all_by("user_id",$this->current_user->id);

		Template::set('crop', $crop);

		Template::set_view('crop/crop/crops');
		Template::render();

	}//end show_users_crop()

	//--------------------------------------------------------------------

	/**
	 * Allows a user to show their own crops.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function show_users_crop_list_raw($user_id)
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		// get the current user crops
		$crop_user_data = $this->crop_model->get_user_crops($user_id);
		return $crop_user_data;


	}//end show_users_crop()

	//--------------------------------------------------------------------

	/**
	 * Allows a user to show their own crops.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function  get_crop_list_raw($crop_name)
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		// get the current user crops
		$crop_list = $this->crop_model->get_crop_list_like($crop_name);
		//print_r($crop_list);
		return $crop_list;


	}//end show_users_crop()

	//--------------------------------------------------------------------

	/**
	 * Method get_crop_list()
	 * 
	 * Get data from DB (CROP and VARIETY) while geting aν AJAX Request.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function get_crop_var_list()
	{
		if (isset($_POST['data']))
		{
			echo '<option value=0">Επιλέξτε ποικιλία...</option>';
			$crop_variety = $this->crop_model->get_crop_variety_list($_POST['data']);
			foreach ($crop_variety as $key => $value) {
				echo '<option value='. $value['crop_variety_id'] .'>' . $value['crop_variety_gr'] . '</option>';
			}
		}
	}

	//--------------------------------------------------------------------

	/**
	 * Allows a user to show their own crops.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function add_crop()
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_crop())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crop_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'crop');

				Template::set_message(lang('crop_create_success'), 'success');
				Template::redirect($this->uri->uri_string());
			}
			else
			{
				Template::set_message(lang('crop_create_failure') . $this->crop_model->error, 'error');
			}
		}
		$crop_crops = $this->crop_model->get_crop_list();

		Template::set('crop_crops', $crop_crops);
		
		Template::set_view('crop/crop/crop_add');
		Template::set('page_title', 'Adding users crop');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of crop data.
	*/
	public function edit()
	{
		// $this->auth->restrict('Crop.Content.Edit');

		$id = $this->uri->segment(4);

		if (empty($id))
		{
			Template::set_message(lang('crop_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/crop');
		}

		if ($this->input->post('submit'))
		{
			if ($this->save_crop('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('crop_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'crop');

				Template::set_message(lang('crop_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('crop_edit_failure') . $this->crop_model->error, 'error');
			}
		}

		Template::set('crop', $this->crop_model->find_by('crop_id', $id));
		Assets::add_module_js('crop', 'crop.js');

		Template::set('toolbar_title', lang('crop_edit') . ' crop');
		Template::set_view('crop/crop/view_edit_my_crop');
		Template::render();
	}

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_crop()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_crop($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		// Security check to see if this user is the current user
		$user_id = $this->current_user->id; 

		//$this->form_validation->set_rules('crop_user_id','User ID','required|trim|xss_clean|is_numeric|max_length[10]');
		$this->form_validation->set_rules('crop_crops','Crop','required|trim|xss_clean|integer|max_length[250]');
		$this->form_validation->set_rules('variety','Variety','trim|xss_clean|integer|max_length[255]');
		$this->form_validation->set_rules('hectar','Hectar','trim|xss_clean|integer|max_length[10]');
		$this->form_validation->set_rules('certification','Certification','trim|xss_clean|integer|max_length[255]');
		// $this->form_validation->set_rules('crop_conventional_crops','Conventional Crops','trim|xss_clean|alpha_extra|max_length[255]');
		// $this->form_validation->set_rules('crop_integrated_crop','Integrated Crop','trim|xss_clean|alpha_extra|max_length[255]');
		// $this->form_validation->set_rules('crop_organic','Organic','trim|xss_clean|alpha_extra|max_length[255]');
		$this->form_validation->set_rules('comment','Comment','trim|xss_clean|max_length[500]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		if ($this->input->post('crop_crops') != 0)	
		{
			// make sure we only pass in the fields we want
			$data = array();
			$data['user_id']        = $user_id;
			$data['crop']        = $this->input->post('crop_crops');
			$data['variety']        = $this->input->post('variety');
			$data['hectar']        = $this->input->post('hectar');
			$data['certification']        = $this->input->post('certification');
			$data['conventional_crops']        = 0;
			$data['integrated_crop']        = 0;
			$data['organic']        = 0;
			$data['comment']        = $this->input->post('comment');

			if ($type == 'insert')
			{
				$id = $this->crop_model->insert($data);

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
				$return = $this->crop_model->update($id, $data);
			}

			return $return;
		} 
		else
		{
			return FALSE;
		}
		
	}

}