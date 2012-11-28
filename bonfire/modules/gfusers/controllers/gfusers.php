<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class gfusers extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('gfusers_model', null, true);
		$this->lang->load('gfusers');

		// Load the messages MODULE
		$this->load->module('messages');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		$records = $this->gfusers_model->find_all();

		Template::set('records', $records);
		Template::render();
	}


	//--------------------------------------------------------------------


	/**
	 * Allows a user to edit their own profile information.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function profile()
	{

		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		$this->load->helper('date');

		$this->load->config('address');
		$this->load->helper('address');

		// $this->load->config('user_meta');
		// $meta_fields = config_item('user_meta_fields');

		// Template::set('meta_fields', $meta_fields);

		/*$this->load->config('gf_user_meta');
		$gf_meta_fields = config_item('gf_user_meta_fields');
		print_r($gf_meta_fields);
		Template::set('gf_meta_fields', $gf_meta_fields);*/

		if ($this->input->post('submit'))
		{

			$user_id = $this->current_user->id;
			if ($this->save_user($user_id))
			{

				// $meta_data = array();
				// foreach ($gf_meta_fields as $field)
				// {
				// 	if ((!isset($field['admin_only']) || $field['admin_only'] === FALSE
				// 		|| (isset($field['admin_only']) && $field['admin_only'] === TRUE
				// 			&& isset($this->current_user) && $this->current_user->role_id == 1))
				// 		&& (!isset($field['frontend']) || $field['frontend'] === TRUE))
				// 	{
				// 		$meta_data[$field['name']] = $this->input->post($field['name']);
				// 	}
				// }

				// // now add the meta is there is meta data
				// $this->user_model->save_meta_for($user_id, $meta_data);

				// Log the Activity

				$user = $this->user_model->find($user_id);
				$log_name = (isset($user->display_name) && !empty($user->display_name)) ? $user->display_name : ($this->settings_lib->item('auth.use_usernames') ? $user->username : $user->email);
				$this->activity_model->log_activity($this->current_user->id, lang('us_log_edit_profile') .': '.$log_name, 'users');

				Template::set_message(lang('us_profile_updated_success'), 'success');

				// redirect to make sure any language changes are picked up
				Template::redirect('gfusers/profile');
				exit;
			}
			else
			{
				Template::set_message(lang('us_profile_updated_error'), 'error');
			}//end if
		}//end if

		// get the current user information
		/*$user = $this->user_model->find_user_and_meta($this->current_user->id);*/
		$user = $this->user_model->find_by("id",$this->current_user->id);

        $settings = $this->settings_lib->find_all();
        if ($settings['auth.password_show_labels'] == 1) {
            Assets::add_module_js('users','password_strength.js');
            Assets::add_module_js('users','jquery.strength.js');
            Assets::add_js($this->load->view('users_js', array('settings'=>$settings), true), 'inline');
        }
        // Generate password hint messages.
		$this->user_model->password_hints();
		Assets::add_module_js('gfusers', 'gfusers.js');

		Template::set('user', $user);
		Template::set('languages', unserialize($this->settings_lib->item('site.languages')));

		Template::set_view('gfusers/gfusers/view_profile');
		Template::render();

	}//end profile()

	//--------------------------------------------------------------------

	/**
	 * Save the user
	 *
	 * @access private
	 *
	 * @param int   $id          The id of the user in the case of an edit operation
	 * @param array $meta_fields Array of meta fields fur the user
	 *
	 * @return bool
	 */
	private function save_user($id=0)
	{

		if ( $id == 0 )
		{
			$id = $this->current_user->id; /* ( $this->input->post('id') > 0 ) ? $this->input->post('id') :  */
		}

		$_POST['id'] = $id;

		// Simple check to make the posted id is equal to the current user's id, minor security check
		if ( $_POST['id'] != $this->current_user->id )
		{
			$this->form_validation->set_message('email', 'lang:us_invalid_userid');
			return FALSE;
		}

		// Setting the payload for Events system.
		$payload = array ( 'user_id' => $id, 'data' => $this->input->post() );


		$this->form_validation->set_rules('email', 'lang:bf_email', 'required|trim|valid_email|max_length[120]|unique[users.email,users.id]|xss_clean');
		$this->form_validation->set_rules('password', 'lang:bf_password', 'trim|strip_tags|min_length[8]|max_length[120]|valid_password');

		// check if a value has been entered for the password - if so then the pass_confirm is required
		// if you don't set it as "required" the pass_confirm field could be left blank and the form validation would still pass
		$extra_rules = !empty($_POST['password']) ? 'required|' : '';
		$this->form_validation->set_rules('pass_confirm', 'lang:bf_password_confirm', 'trim|strip_tags|'.$extra_rules.'matches[password]');

		if ($this->settings_lib->item('auth.use_usernames'))
		{
			$this->form_validation->set_rules('username', 'lang:bf_username', 'required|trim|strip_tags|max_length[30]|unique[users.username,users.id]|xss_clean');
		}

		$this->form_validation->set_rules('language', 'lang:bf_language', 'required|trim|strip_tags|xss_clean');
		// $this->form_validation->set_rules('timezones', 'lang:bf_timezone', 'required|trim|strip_tags|max_length[4]|xss_clean');
		// $this->form_validation->set_rules('display_name', 'lang:bf_display_name', 'trim|strip_tags|max_length[255]|xss_clean');

		// Added Event "before_user_validation" to run before the form validation
		Events::trigger('before_user_validation', $payload );


		// foreach ($meta_fields as $field)
		// {
		// 	if ((!isset($field['admin_only']) || $field['admin_only'] === FALSE
		// 		|| (isset($field['admin_only']) && $field['admin_only'] === TRUE
		// 			&& isset($this->current_user) && $this->current_user->role_id == 1))
		// 		&& (!isset($field['frontend']) || $field['frontend'] === TRUE))
		// 	{
		// 		$this->form_validation->set_rules($field['name'], $field['label'], $field['rules']);
		// 	}
		// }


		if ($this->form_validation->run($this) === FALSE)
		{
			return FALSE;
		}

		// Compile our core user elements to save.
		$data = array(
			'email'		=> $this->input->post('email'),
			'language'	=> $this->input->post('language'),
			// 'timezone'	=> $this->input->post('timezones'),
		);

		if ($this->input->post('password'))
		{
			$data['password'] = $this->input->post('password');
		}

		if ($this->input->post('pass_confirm'))
		{
			$data['pass_confirm'] = $this->input->post('pass_confirm');
		}

		// if ($this->input->post('display_name'))
		// {
		// 	$data['display_name'] = $this->input->post('display_name');
		// }

		if ($this->settings_lib->item('auth.use_usernames'))
		{
			if ($this->input->post('username'))
			{
				$data['username'] = $this->input->post('username');
			}
		}

		// Any modules needing to save data?
		// Event to run after saving a user
		//Events::trigger('save_user', $payload );

		return $this->user_model->update($id, $data);

	}//end save_user()

	//--------------------------------------------------------------------

	/**
	 * Save the users personal data
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function personal_data()
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		// Save users personla data
		if ($this->input->post('save'))
		{
			// Check to see if users has already add personal data.
			// if NO, then data insert
			// else, data update
			$personal_data = $this->gfusers_model->find_by('user_id',$this->current_user->id);
			if (empty($personal_data))
			{
				// insert personal data
				if ($insert_id = $this->save_user_personal_data())
				{
					// Log the activity
					$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'gfusers');

					Template::set_message(lang('gfusers_create_success'), 'success');
					Template::redirect('/gfusers/personal_data');
				}
				else
				{
					Template::set_message(lang('gfusers_create_failure') . $this->gfusers_model->error, 'error');
				}
			} 
			else
			{
				// update personal data
				$personal_data_id = $personal_data->id;
				if (empty($personal_data_id))
				{
					Template::set_message(lang('gfusers_invalid_id'), 'error');
					Template::redirect('/gfusers/personal_data');
				}

				if ($this->save_user_personal_data('update', $personal_data_id))
				{
					// Log the activity
					$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_edit_record').': ' . $personal_data_id . ' : ' . $this->input->ip_address(), 'gfusers');
					Template::set_message(lang('gfusers_edit_success'), 'success');
				}
				else
				{
					Template::set_message(lang('gfusers_edit_failure') . $this->gfusers_model->error, 'error');
				}

				Template::set_message(lang('gfusers_create_success'), 'success');
				Template::redirect('/gfusers/personal_data');
			}
		}

		// get the current user information
		$gfusers = $this->gfusers_model->find_by("user_id",$this->current_user->id);
		Assets::add_module_js('gfusers', 'gfusers.js');

		Template::set('gfusers', $gfusers);
		Template::set('languages', unserialize($this->settings_lib->item('site.languages')));

		Template::set_view('gfusers/gfusers/view_personal_data');
		Template::render();

	 }//end of personal_data()

	 //--------------------------------------------------------------------
	 

	/**
	 * Save the save_user_personal_data
	 *
	 * @access private
	 *
	 * @param int   $id          The id of the user in the case of an edit operation
	 * @param array $meta_fields Array of meta fields fur the user
	 *
	 * @return bool
	 */
	public function save_user_personal_data($type='insert', $id=0)
	{

		//$_POST['id'] = $id;

		// Simple check to make the posted id is equal to the current user's id, minor security check
		/*if ( $_POST['id'] != $this->current_user->id )
		{
			$this->form_validation->set_message('email', 'lang:us_invalid_userid');
			return FALSE;
		}*/

		// Setting the payload for Events system.
		$payload = array ( 'user_id' => $id, 'data' => $this->input->post() );

		if ($type == 'update') {
			$_POST['id'] = $id;
			//$id = $this->current_user->id;
		}


		// $this->form_validation->set_rules('gfusers_user_id','User ID','required|trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_name','Name','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_last_name','Last Name','trim|xss_clean|max_length[255]');
		// $this->form_validation->set_rules('gfusers_comp_name','Company Name','trim|xss_clean|max_length[255]');
		// $this->form_validation->set_rules('gfusers_comp_description','Company Description','trim|xss_clean');
		// $this->form_validation->set_rules('gfusers_comp_category','Company Category','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_comp_email','Company Email','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_website','Website','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_address','Address','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_city','City','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_state','State','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_zip','Zip','trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('gfusers_country','Country','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_phone_1','Telephone 1','trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('gfusers_phone_2','Telephone 2','trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('gfusers_fax','Fax','trim|xss_clean|max_length[100]');
		// $this->form_validation->set_rules('gfusers_is_farmer','Is Farmer','trim|xss_clean|max_length[1]');
		// $this->form_validation->set_rules('gfusers_is_company','Is Company','trim|xss_clean|max_length[1]');
		// $this->form_validation->set_rules('gfusers_is_user','Is User','trim|xss_clean|max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		// $data['user_id']        = $this->input->post('gfusers_user_id');
		$data['user_id']        = $this->current_user->id;
		$data['name']        = $this->input->post('name');
		$data['last_name']        = $this->input->post('last_name');
		// $data['comp_name']        = $this->input->post('gfusers_comp_name');
		// $data['comp_description']        = $this->input->post('gfusers_comp_description');
		// $data['comp_category']        = $this->input->post('gfusers_comp_category');

		$data['comp_name']        = "";
		$data['comp_description']        = "";
		$data['comp_category']        = "";

		$data['comp_email']        = $this->input->post('comp_email');
		$data['website']        = $this->input->post('website');
		$data['address']        = $this->input->post('address');
		$data['city']        = $this->input->post('city');
		$data['state']        = $this->input->post('state');
		$data['zip']        = $this->input->post('zip');
		$data['country']        = $this->input->post('country');
		$data['phone_1']        = $this->input->post('phone_1');
		$data['phone_2']        = $this->input->post('phone_2');
		$data['fax']        = $this->input->post('fax');
		$data['image']        = "";
		// $data['is_farmer']        = $this->input->post('is_farmer');
		// $data['is_company']        = $this->input->post('is_company');
		// $data['is_user']        = $this->input->post('is_user');

		$data['is_farmer']        = $this->input->post('is_farmer');;
		$data['is_company']        = $this->input->post('is_company');;
		$data['is_user']        = $this->input->post('is_user');;

		if ($type == 'insert')
		{
			$id = $this->gfusers_model->insert($data);

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
			$return = $this->gfusers_model->update($id, $data);
		}

		return $return;

	}//end of personal_data()

	//--------------------------------------------------------------------

	/**
	 * Save the users companys data
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function company_data()
	{
		if ($this->auth->is_logged_in() === FALSE)
		{
			$this->auth->logout();
			redirect('login');
		}

		// Save users personla data
		if ($this->input->post('save'))
		{
			// Check to see if users has already add personal data.
			// if NO, then data insert
			// else, data update
			$personal_data = $this->gfusers_model->find_by('user_id',$this->current_user->id);
			if (empty($personal_data))
			{
				// insert personal data
				if ($insert_id = $this->save_user_company_data())
				{
					// Log the activity
					$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'gfusers');

					Template::set_message(lang('gfusers_create_success'), 'success');
					Template::redirect('/gfusers/company_data');
				}
				else
				{
					Template::set_message(lang('gfusers_create_failure') . $this->gfusers_model->error, 'error');
				}
			} 
			else
			{
				// update personal data
				$personal_data_id = $personal_data->id;
				if (empty($personal_data_id))
				{
					Template::set_message(lang('gfusers_invalid_id'), 'error');
					Template::redirect('/gfusers/company_data');
				}

				if ($this->save_user_company_data('update', $personal_data_id))
				{
					// Log the activity
					$this->activity_model->log_activity($this->current_user->id, lang('gfusers_act_edit_record').': ' . $personal_data_id . ' : ' . $this->input->ip_address(), 'gfusers');
					Template::set_message(lang('gfusers_edit_success'), 'success');
				}
				else
				{
					Template::set_message(lang('gfusers_edit_failure') . $this->gfusers_model->error, 'error');
				}

				Template::set_message(lang('gfusers_create_success'), 'success');
				Template::redirect('/gfusers/company_data');
			}
		}

		// get the current user information
		$gfusers = $this->gfusers_model->find_by("user_id",$this->current_user->id);
		//print_r($gfusers);
		Assets::add_module_js('gfusers', 'gfusers.js');

		Template::set('gfusers', $gfusers);
		Template::set('languages', unserialize($this->settings_lib->item('site.languages')));

		Template::set_view('gfusers/gfusers/view_company_data');
		Template::render();

	 }//end of company_data()

	 //--------------------------------------------------------------------
	 

	/**
	 * Save the save_user_company_data
	 *
	 * @access private
	 *
	 * @param int   $id          The id of the user in the case of an edit operation
	 * @param array $meta_fields Array of meta fields fur the user
	 *
	 * @return bool
	 */
	private function save_user_company_data($type='insert', $id=0)
	{
		// Setting the payload for Events system.
		$payload = array ( 'user_id' => $id, 'data' => $this->input->post() );

		if ($type == 'update') {
			$_POST['id'] = $id;
			//$id = $this->current_user->id;
		}

		$this->form_validation->set_rules('gfusers_comp_name','Company Name','trim|xss_clean|max_length[255]');
		$this->form_validation->set_rules('gfusers_comp_description','Company Description','trim|xss_clean');
		$this->form_validation->set_rules('gfusers_comp_category','Company Category','trim|xss_clean|max_length[255]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['comp_name']        = $this->input->post('comp_name');
		$data['comp_description']        = $this->input->post('comp_description');
		$data['comp_category']        = $this->input->post('comp_category');
		// Todo: If a new user register a company it must set the is_company to 1. First check 
		//			if company name is set...
		$data['is_company']        = "1";

		if ($type == 'insert')
		{
			$id = $this->gfusers_model->insert($data);

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
			$return = $this->gfusers_model->update($id, $data);
		}

		return $return;

	}//end of save_user_company_data()

	//--------------------------------------------------------------------



	/*
		Method: all_gfusers()

		Displays a list of users. There is the option to add/remove followers.
	*/
	public function all_gfusers()
	{
		// Load the Followers MODULE
		$this->load->module('followers');
		// Load Followers Model
		$this->load->model('followers_model', null, true);

		$follower_data  = array('user_id' => $this->current_user->id, 'deleted' => 0 );
		$followers = $this->followers_model->find_all_by($follower_data);
		// print_r($followers);

		$records = $this->gfusers_model->all_gfusers();
		//print_r($records);

		Template::set('followers', $followers);
		Template::set('records', $records);
		Template::set_view('gfusers/gfusers/all_gfusers');
		Template::render();
	}

	//--------------------------------------------------------------------

}