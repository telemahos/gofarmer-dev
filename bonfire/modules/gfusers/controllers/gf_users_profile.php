<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class gf_users_profile extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		// $this->load->library('form_validation');
		$this->load->model('gfusers_model', null, true);
		$this->lang->load('gfusers');
		// Load the Followers MODULE
		$this->load->module('followers');
		$this->load->model('followers_model', null, true);
		// load crop module
		$this->load->module('crop');
		$this->load->model('crop_model');
		// load croffer module
		$this->load->module('croffer');
		$this->load->model('croffer_model');
		// Load the messages MODULE
		$this->load->module('messages');
		// load croffer Questions
		$this->load->module('questions');
		$this->load->model('questions_model');

		// Template::set_block('sidebar', 'gfusers/gfusers/sidebar');
		Template::set_block('sidebar_left', 'gfusers/gfusers/users/sidebar_left_users');
		Template::set_block('sidebar_right', 'gfusers/gfusers/sidebar_right');
		
	}

	//--------------------------------------------------------------------

	/**
	 * Allows a user to view their own profile information.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function users_profile()
	{ 
		// echo $this->uri->segment(4);
		// get the current user information
		$user = $this->user_model->find_by("id",$this->uri->segment(4));
		Template::set('user', $user);

		// get the current user personal information
		$gfusers = $this->gfusers_model->find_by("user_id",$this->uri->segment(4));
		Template::set('gfusers', $gfusers);

		// get following info of this user
		$following_data  = array('user_id' => $this->current_user->id,'follower_id' => $this->uri->segment(4), 'deleted' => 0 );
		$following = $this->followers_model->find_by($following_data);
		$count_user_following = array('user_id' => $this->uri->segment(4), 'followers.deleted' => 0); 
		$total_following =  $this->followers_model->count_by($count_user_following);
		Template::set('total_following', $total_following);
		Template::set('following', $following);

		// get followers info of this user
		$follower_data  = array('follower_id' => $this->uri->segment(4), 'deleted' => 0 );
		$follower = $this->followers_model->find_by($follower_data);
		$count_user_followers = array('follower_id' => $this->uri->segment(4), 'followers.deleted' => 0); 
		$total_followers =  $this->followers_model->count_by($count_user_followers);
		Template::set('total_followers', $total_followers);
		Template::set('follower', $follower);

		// get user's crops
		$user_crops = $this->crop_model->get_user_limit_crops($this->uri->segment(4),5,0);
		$count_user_crops = array('user_id' => $this->uri->segment(4), 'crop.deleted' => 0); 
		$total_crops =  $this->crop_model->count_by($count_user_crops);
		Template::set('total_crops', $total_crops);
		Template::set('user_crops', $user_crops);

		// get user's offers
		$user_croffers = $this->croffer_model->get_user_limit_croffers($this->uri->segment(4),5,0);
		$count_user_croffers = array('user_id' => $this->uri->segment(4), 'crop_offer.deleted' => 0); 
		$total_croffers =  $this->croffer_model->count_by($count_user_croffers);
		Template::set('total_croffers', $total_croffers);
		Template::set('user_croffers', $user_croffers);

		// get the current user questions
		$data = array('user_id' => $this->uri->segment(4),'question_id' => 0); 
		$user_questions = $this->questions_model->find_all_by($data);
		Template::set('user_questions', $user_questions);
		$count_user_questions = array('user_id' => $this->uri->segment(4),'question_id' => 0 , 'questions.deleted' => 0); 
		$total_questions =  $this->questions_model->count_by($count_user_questions);
		Template::set('total_questions', $total_questions);
		
		Template::set_view('gfusers/gfusers/users/view_users_profile');
		Template::render('three_col');
		// Template::render('two_right');
	}

	//--------------------------------------------------------------------

	/**
	 * Allows a user to view their own profile information.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function users_crops()
	{ 
		// Load index() for the left Bar data.
		$this->users_profile();

		// get the current user crops
		$records = $this->crop_model->get_user_crops($this->uri->segment(4));
		Template::set('records', $records);

		Template::set_view('gfusers/gfusers/users/view_users_crops');
		Template::render('three_col');
	}

	//--------------------------------------------------------------------

	/**
	 * Allows a user to view their own profile information.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function users_crop_offers()
	{ 
		// Load index() for the left Bar data.
		$this->users_profile();

		// get user's crop offers
		$records = $this->croffer_model->get_user_croffers($this->uri->segment(4));
		Template::set('records', $records);

		Template::set_view('gfusers/gfusers/users/view_users_crop_offers');
		Template::render('three_col');
	}

	//--------------------------------------------------------------------

	/**
	 * Allows a user to view their own profile information.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function users_following()
	{ 
		// Load index() for the left Bar data.
		$this->users_profile();

		//Users that the selected User is Following
		$following = $this->followers_model->get_following($this->uri->segment(4));
		Template::set('following', $following);

		// Users that I follow
		$i_following_data  = array('user_id' => $this->current_user->id, 'deleted' => 0 );
		$i_following = $this->followers_model->find_all_by($i_following_data);
		Template::set('i_following', $i_following);

		Template::set_view('gfusers/gfusers/users/view_users_following');
		Template::render('three_col');
	}

	//--------------------------------------------------------------------

	/**
	 * Allows a user to view their own profile information.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function users_followers()
	{ 
		// Load index() for the left Bar data.
		$this->users_profile();

		// Check to see if some of them you are following to.
		// $following_data  = array('user_id' => $this->uri->segment(4), 'deleted' => 0 );
		// $following = $this->followers_model->find_all_by($following_data);
		// Template::set('following', $following);

		$followers = $this->followers_model->get_followers($this->uri->segment(4));
		Template::set('followers', $followers);
		// Users that they follow ME
		$my_followers_data  = array('user_id' => $this->current_user->id, 'deleted' => 0 );
		$i_followers = $this->followers_model->find_all_by($my_followers_data);
		Template::set('i_followers', $i_followers);

		Template::set_view('gfusers/gfusers/users/view_users_followers');
		Template::render('three_col');
	}

}