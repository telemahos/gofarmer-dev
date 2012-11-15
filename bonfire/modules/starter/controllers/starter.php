<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class starter extends Front_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->lang->load('starter');

		// Load the messages MODULE
		// $this->load->module('messages');
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{
		// Are users even allowed to register?
		if (!$this->settings_lib->item('auth.allow_register'))
		{
			Template::set_message(lang('us_register_disabled'), 'error');
			Template::redirect('/');
		}

		$this->load->model('roles/role_model');
		$this->load->helper('date');

		$this->load->config('address');
		$this->load->helper('address');

		// $this->load->config('user_meta');
		// $meta_fields = config_item('user_meta_fields');
		// Template::set('meta_fields', $meta_fields);

		if ($this->input->post('submit'))
		{
			// Validate input
			$this->form_validation->set_rules('email', 'lang:bf_email', 'required|trim|strip_tags|valid_email|max_length[120]|unique[users.email]|xss_clean');

			if ($this->settings_lib->item('auth.use_usernames'))
			{
				$this->form_validation->set_rules('username', 'lang:bf_username', 'required|trim|strip_tags|max_length[30]|unique[users.username]|xss_clean');
			}

			$this->form_validation->set_rules('password', 'lang:bf_password', 'required|trim|strip_tags|min_length[8]|max_length[120]|valid_password');
			$this->form_validation->set_rules('pass_confirm', 'lang:bf_password_confirm', 'required|trim|strip_tags|matches[password]');

			// $this->form_validation->set_rules('language', 'lang:bf_language', 'trim|strip_tags|xss_clean');
			// $this->form_validation->set_rules('timezones', 'lang:bf_timezone', 'trim|strip_tags|max_length[4]|xss_clean');
			// $this->form_validation->set_rules('display_name', 'lang:bf_display_name', 'trim|strip_tags|max_length[255]|xss_clean');


			// $meta_data = array();
			// foreach ($meta_fields as $field)
			// {
			// 	if ((!isset($field['admin_only']) || $field['admin_only'] === FALSE
			// 		|| (isset($field['admin_only']) && $field['admin_only'] === TRUE
			// 			&& isset($this->current_user) && $this->current_user->role_id == 1))
			// 		&& (!isset($field['frontend']) || $field['frontend'] === TRUE))
			// 	{
			// 		$this->form_validation->set_rules($field['name'], $field['label'], $field['rules']);

			// 		$meta_data[$field['name']] = $this->input->post($field['name']);
			// 	}
			// }

			if ($this->form_validation->run($this) !== FALSE)
			{
				// Time to save the user...
				$data = array(
						'email'		=> $_POST['email'],
						'username'	=> isset($_POST['username']) ? $_POST['username'] : '',
						'password'	=> $_POST['password'],
						'language'	=> 'english',
						'timezone'	=> 'UP2',
						// 'language'	=> $this->input->post('language'), 
						// 'timezone'	=> $this->input->post('timezones'), 
					);

				// User activation method
				$activation_method = $this->settings_lib->item('auth.user_activation_method');

				// No activation method
				if ($activation_method == 0)
				{
					// Activate the user automatically
					$data['active'] = 1;
				}

				if ($user_id = $this->user_model->insert($data))
				{
					// now add the meta is there is meta data
					 //$this->user_model->save_meta_for($user_id, $meta_data);

					/*
					 * USER ACTIVATIONS ENHANCEMENT
					 */

					// Prepare user messaging vars
					$subject = '';
					$email_mess = '';
					$message = lang('us_email_thank_you');
					$type = 'success';
					$site_title = $this->settings_lib->item('site.title');
					$error = false;

					switch ($activation_method)
					{
						case 0:
							// No activation required. Activate the user and send confirmation email
							$subject 		=  str_replace('[SITE_TITLE]',$this->settings_lib->item('site.title'),lang('us_account_reg_complete'));
							$email_mess 	= $this->load->view('_emails/activated', array('title'=>$site_title,'link' => site_url()), true);
							$message 		.= lang('us_account_active_login');
							break;
						case 1:
							// 	Email Activiation.
							//	Create the link to activate membership
							// Run the account deactivate to assure everything is set correctly
							// Switch on the login type to test the correct field
							$login_type = $this->settings_lib->item('auth.login_type');
							switch ($login_type)
							{
								case 'username':
									if ($this->settings_lib->item('auth.use_usernames'))
									{
										$id_val = $_POST['username'];
									}
									else
									{
										$id_val = $_POST['email'];
										$login_type = 'email';
									}
									break;
								case 'email':
								case 'both':
								default:
									$id_val = $_POST['email'];
									$login_type = 'email';
									break;
							} // END switch

							$activation_code = $this->user_model->deactivate($id_val, $login_type);
							$activate_link   = site_url('activate/'. str_replace('@', ':', $_POST['email']) .'/'. $activation_code);
							$subject         =  lang('us_email_subj_activate');

							$email_message_data = array(
								'title' => $site_title,
								'code'  => $activation_code,
								'link'  => $activate_link
							);
							$email_mess = $this->load->view('_emails/activate', $email_message_data, true);
							$message   .= lang('us_check_activate_email');
							break;
						case 2:
							// Admin Activation
							// Clear hash but leave user inactive
							$subject    =  lang('us_email_subj_pending');
							$email_mess = $this->load->view('_emails/pending', array('title'=>$site_title), true);
							$message   .= lang('us_admin_approval_pending');
							break;
					}//end switch

					// Now send the email
					$this->load->library('emailer/emailer');
					$data = array(
						'to'		=> $_POST['email'],
						'subject'	=> $subject,
						'message'	=> $email_mess
					);

					if (!$this->emailer->send($data))
					{
						$message .= lang('us_err_no_email'). $this->emailer->errors;
						$error    = true;
					}

					if ($error)
					{
						$type = 'error';
					}
					else
					{
						$type = 'success';
					}

					Template::set_message($message, $type);

					// Log the Activity

					$this->activity_model->log_activity($user_id, lang('us_log_register') , 'users');
					//Template::redirect('login');
				}
				else
				{
					echo "hi kostas. This is wrong...!!!";
					Template::set_message(lang('us_registration_fail'), 'error');
					redirect('/user_registration');
				}//end if
			}//end if
		}//end if

        $settings = $this->settings_lib->find_all();
        if ($settings['auth.password_show_labels'] == 1) {
            Assets::add_module_js('users','password_strength.js');
            Assets::add_module_js('users','jquery.strength.js');
            Assets::add_js($this->load->view('users_js', array('settings'=>$settings), true), 'inline');
        }

        // Generate password hint messages.
		$this->user_model->password_hints();

		Template::set('languages', unserialize($this->settings_lib->item('site.languages')));

		// Template::set_view('users/users/register');
		// Template::set('page_title', 'Register');
		// Template::render();

		Template::set_view('starter/starter/index');
		/*Template::set_view('starter/home/index');*/
		Template::render();
	}

	//--------------------------------------------------------------------

	/*
		Method: user_in()

		Displays a list of form data.
	*/
	public function user_in()
	{

		Template::render();
	}

	//--------------------------------------------------------------------

	/**
	 * Display the registration form for the user and manage the registration process
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function user_registration()
	{
		// Are users even allowed to register?
		if (!$this->settings_lib->item('auth.allow_register'))
		{
			Template::set_message(lang('us_register_disabled'), 'error');
			Template::redirect('/');
		}

		$this->load->model('roles/role_model');
		$this->load->helper('date');

		$this->load->config('address');
		$this->load->helper('address');

		// $this->load->config('user_meta');
		// $meta_fields = config_item('user_meta_fields');
		// Template::set('meta_fields', $meta_fields);

		if ($this->input->post('submit'))
		{
			// Validate input
			$this->form_validation->set_rules('email', 'lang:bf_email', 'required|trim|valid_email|max_length[120]|unique[users.email]');

			if ($this->settings_lib->item('auth.use_usernames'))
			{
				$this->form_validation->set_rules('username', 'lang:bf_username', 'required|trim|max_length[30]|unique[users.username]');
			}

			$this->form_validation->set_rules('password', 'lang:bf_password', 'required|min_length[8]|max_length[120]|valid_password');
			$this->form_validation->set_rules('pass_confirm', 'lang:bf_password_confirm', 'required|matches[password]');

			// $this->form_validation->set_rules('language', 'lang:bf_language', 'required|trim');
			// $this->form_validation->set_rules('timezones', 'lang:bf_timezone', 'required|trim|max_length[4]');
			// $this->form_validation->set_rules('display_name', 'lang:bf_display_name', 'trim|max_length[255]');


			// $meta_data = array();
			// foreach ($meta_fields as $field)
			// {
			// 	if ((!isset($field['admin_only']) || $field['admin_only'] === FALSE
			// 		|| (isset($field['admin_only']) && $field['admin_only'] === TRUE
			// 			&& isset($this->current_user) && $this->current_user->role_id == 1))
			// 		&& (!isset($field['frontend']) || $field['frontend'] === TRUE))
			// 	{
			// 		$this->form_validation->set_rules($field['name'], $field['label'], $field['rules']);

			// 		$meta_data[$field['name']] = $this->input->post($field['name']);
			// 	}
			// }

			

			if ($this->form_validation->run($this) !== FALSE)
			{
				// Time to save the user...
				$data = array(
						'email'			=> $_POST['email'],
						'username'		=> isset($_POST['username']) ? $_POST['username'] : '',
						'password'		=> $_POST['password'],
						'language'	=> 'greek',
						'timezone'	=> 'UP2',
						// 'language'		=> $this->input->post('language'),
						// 'timezone'		=> $this->input->post('timezones'),
						// 'display_name'	=> $this->input->post('display_name'),
					);

				// User activation method
				$activation_method = $this->settings_lib->item('auth.user_activation_method');

				// No activation method
				if ($activation_method == 0)
				{
					// Activate the user automatically
					$data['active'] = 1;
				}

				if ($user_id = $this->user_model->insert($data))
				{
					//Insert the userID and the username in the GFUsers table.
					$gfusername = isset($_POST['username']) ? $_POST['username'] : '';
					$gfuser_data = array(
						'user_id' => $user_id, 
						'name' => $gfusername,
						'last_name' => "",
						'comp_name' => "",
						'comp_description' => "",
						'comp_category' => "",
						'comp_email' => "",
						'website' => "",
						'address' => "",
						'city' => "",
						'state' => "",
						'zip' => "",
						'country' => "",
						'phone_1' => "",
						'phone_2' => "",
						'fax' => "",
						'image' => "",
						'is_farmer' => "1",
						'is_company' => "0",
						'is_user' => "1"
						);
					$this->db->insert('gfusers', $gfuser_data); 

					// now add the meta is there is meta data
					// $this->user_model->save_meta_for($user_id, $meta_data);

					/*
					 * USER ACTIVATIONS ENHANCEMENT
					 */

					// Prepare user messaging vars
					$subject = '';
					$email_mess = '';
					$message = lang('us_email_thank_you');
					$type = 'success';
					$site_title = $this->settings_lib->item('site.title');
					$error = false;

					switch ($activation_method)
					{
						case 0:
							// No activation required. Activate the user and send confirmation email
							$subject 		=  str_replace('[SITE_TITLE]',$this->settings_lib->item('site.title'),lang('us_account_reg_complete'));
							$email_mess 	= $this->load->view('_emails/activated', array('title'=>$site_title,'link' => site_url()), true);
							$message 		.= lang('us_account_active_login');
							break;
						case 1:
							// 	Email Activiation.
							//	Create the link to activate membership
							// Run the account deactivate to assure everything is set correctly
							// Switch on the login type to test the correct field
							$login_type = $this->settings_lib->item('auth.login_type');
							switch ($login_type)
							{
								case 'username':
									if ($this->settings_lib->item('auth.use_usernames'))
									{
										$id_val = $_POST['username'];
									}
									else
									{
										$id_val = $_POST['email'];
										$login_type = 'email';
									}
									break;
								case 'email':
								case 'both':
								default:
									$id_val = $_POST['email'];
									$login_type = 'email';
									break;
							} // END switch

							$activation_code = $this->user_model->deactivate($id_val, $login_type);
							$activate_link   = site_url('activate/'. str_replace('@', ':', $_POST['email']) .'/'. $activation_code);
							$subject         =  lang('us_email_subj_activate');

							$email_message_data = array(
								'title' => $site_title,
								'code'  => $activation_code,
								'link'  => $activate_link
							);
							$email_mess = $this->load->view('_emails/activate', $email_message_data, true);
							$message   .= lang('us_check_activate_email');
							break;
						case 2:
							// Admin Activation
							// Clear hash but leave user inactive
							$subject    =  lang('us_email_subj_pending');
							$email_mess = $this->load->view('_emails/pending', array('title'=>$site_title), true);
							$message   .= lang('us_admin_approval_pending');
							break;
					}//end switch

					// Now send the email
					$this->load->library('emailer/emailer');
					$data = array(
						'to'		=> $_POST['email'],
						'subject'	=> $subject,
						'message'	=> $email_mess
					);

					if (!$this->emailer->send($data))
					{
						$message .= lang('us_err_no_email'). $this->emailer->errors;
						$error    = true;
					}

					if ($error)
					{
						$type = 'error';
					}
					else
					{
						$type = 'success';
					}

					Template::set_message($message, $type);

					// Log the Activity

					$this->activity_model->log_activity($user_id, lang('us_log_register') , 'users');
					Template::redirect('login');
				}
				else
				{
					Template::set_message(lang('us_registration_fail'), 'error');
					redirect('/user_registration');
				}//end if
			}//end if
		}//end if

        $settings = $this->settings_lib->find_all();
        if ($settings['auth.password_show_labels'] == 1) {
            Assets::add_module_js('users','password_strength.js');
            Assets::add_module_js('users','jquery.strength.js');
            Assets::add_js($this->load->view('users_js', array('settings'=>$settings), true), 'inline');
        }

        // Generate password hint messages.
		$this->user_model->password_hints();

		Template::set('languages', unserialize($this->settings_lib->item('site.languages')));

		Template::set_view('starter/starter/registration');
		Template::set('page_title', 'Register');
		Template::render();

	}//end register()

	//--------------------------------------------------------------------

	/**
	 * Presents the login function and allows the user to actually login.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function login()
	{
		// if the user is not logged in continue to show the login page
		if ($this->auth->is_logged_in() === FALSE)
		{
			if ($this->input->post('submit'))
			{
				$remember = $this->input->post('remember_me') == '1' ? TRUE : FALSE;

				// Try to login
				if ($this->auth->login($this->input->post('login'), $this->input->post('password'), $remember) === TRUE)
				{

					// Log the Activity
					$this->activity_model->log_activity($this->auth->user_id(), lang('us_log_logged').': ' . $this->input->ip_address(), 'users');

					/*
						In many cases, we will have set a destination for a
						particular user-role to redirect to. This is helpful for
						cases where we are presenting different information to different
						roles that might cause the base destination to be not available.
					*/
					if ($this->settings_lib->item('auth.do_login_redirect') && !empty ($this->auth->login_destination))
					{
						Template::redirect($this->auth->login_destination);
					}
					else
					{
						if (!empty($this->requested_page))
						{
							Template::redirect($this->requested_page);
						}
						else
						{
							Template::redirect('/');
						}
					}
				}//end if
			}//end if

			Template::set_view('starter/starter/login');
			Template::set('page_title', 'Login');
			Template::render('login');
		}
		else
		{

			Template::redirect('/');
		}//end if

	}//end login()

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

		$this->load->config('gf_user_meta');
		$gf_meta_fields = config_item('gf_user_meta_fields');
		//print_r($gf_meta_fields);
		Template::set('gf_meta_fields', $gf_meta_fields);

		if ($this->input->post('submit'))
		{

			$user_id = $this->current_user->id;
			if ($this->save_user($user_id, $gf_meta_fields))
			{

				$meta_data = array();
				foreach ($gf_meta_fields as $field)
				{
					if ((!isset($field['admin_only']) || $field['admin_only'] === FALSE
						|| (isset($field['admin_only']) && $field['admin_only'] === TRUE
							&& isset($this->current_user) && $this->current_user->role_id == 1))
						&& (!isset($field['frontend']) || $field['frontend'] === TRUE))
					{
						$meta_data[$field['name']] = $this->input->post($field['name']);
					}
				}

				// now add the meta is there is meta data
				$this->user_model->save_meta_for($user_id, $meta_data);

				// Log the Activity

				$user = $this->user_model->find($user_id);
				$log_name = (isset($user->display_name) && !empty($user->display_name)) ? $user->display_name : ($this->settings_lib->item('auth.use_usernames') ? $user->username : $user->email);
				$this->activity_model->log_activity($this->current_user->id, lang('us_log_edit_profile') .': '.$log_name, 'users');

				Template::set_message(lang('us_profile_updated_success'), 'success');

				// redirect to make sure any language changes are picked up
				Template::redirect('starter/profile');
				exit;
			}
			else
			{
				Template::set_message(lang('us_profile_updated_error'), 'error');
			}//end if
		}//end if

		// get the current user information
		$user = $this->user_model->find_user_and_meta($this->current_user->id);

        $settings = $this->settings_lib->find_all();
        if ($settings['auth.password_show_labels'] == 1) {
            Assets::add_module_js('users','password_strength.js');
            Assets::add_module_js('users','jquery.strength.js');
            Assets::add_js($this->load->view('users_js', array('settings'=>$settings), true), 'inline');
        }
        // Generate password hint messages.
		$this->user_model->password_hints();

		Template::set('user', $user);
		Template::set('languages', unserialize($this->settings_lib->item('site.languages')));

		Template::set_view('starter/starter/edit_profile');
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
	private function save_user($id=0, $meta_fields=array())
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
		$this->form_validation->set_rules('timezones', 'lang:bf_timezone', 'required|trim|strip_tags|max_length[4]|xss_clean');
		$this->form_validation->set_rules('display_name', 'lang:bf_display_name', 'trim|strip_tags|max_length[255]|xss_clean');

		// Added Event "before_user_validation" to run before the form validation
		Events::trigger('before_user_validation', $payload );


		foreach ($meta_fields as $field)
		{
			if ((!isset($field['admin_only']) || $field['admin_only'] === FALSE
				|| (isset($field['admin_only']) && $field['admin_only'] === TRUE
					&& isset($this->current_user) && $this->current_user->role_id == 1))
				&& (!isset($field['frontend']) || $field['frontend'] === TRUE))
			{
				$this->form_validation->set_rules($field['name'], $field['label'], $field['rules']);
			}
		}


		if ($this->form_validation->run($this) === FALSE)
		{
			return FALSE;
		}

		// Compile our core user elements to save.
		$data = array(
			'email'		=> $this->input->post('email'),
			'language'	=> $this->input->post('language'),
			'timezone'	=> $this->input->post('timezones'),
		);

		if ($this->input->post('password'))
		{
			$data['password'] = $this->input->post('password');
		}

		if ($this->input->post('pass_confirm'))
		{
			$data['pass_confirm'] = $this->input->post('pass_confirm');
		}

		if ($this->input->post('display_name'))
		{
			$data['display_name'] = $this->input->post('display_name');
		}

		if ($this->settings_lib->item('auth.use_usernames'))
		{
			if ($this->input->post('username'))
			{
				$data['username'] = $this->input->post('username');
			}
		}

		// Any modules needing to save data?
		// Event to run after saving a user
		Events::trigger('save_user', $payload );

		return $this->user_model->update($id, $data);

	}//end save_user()

	//--------------------------------------------------------------------


}//end starter

/* Front-end Users Controller */
/* End of file starter.php */
/* Location: */