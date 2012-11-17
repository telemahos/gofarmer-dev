<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class gf_my_profile extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('gfusers_model', null, true);
		$this->lang->load('gfusers');
		// load crop module
		$this->load->module('crop');
		$this->load->model('crop_model');
		// Load the Followers MODULE
		$this->load->module('followers');
		$this->load->model('followers_model', null, true);
		// load croffer module
		$this->load->module('croffer');
		$this->load->model('croffer_model');
		// Load the messages MODULE
		// $this->load->module('messages');
		// load croffer Questions
		$this->load->module('questions');
		$this->load->model('questions_model');

		Template::set_block('sidebar', 'gfusers/gfusers/sidebar');
		Template::set_block('sidebar_left', 'gfusers/gfusers/sidebar_left');
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
	public function index()
	{ 
		// Add new user image
		if ($this->input->post('submit'))
		{
			$this->gfusers_model->add_user_image($this->current_user->id);
		}
		// get the current user information
		$user = $this->user_model->find_by("id",$this->current_user->id);
		Template::set('user', $user);

		// get the current user personal information
		$gfusers = $this->gfusers_model->find_by("user_id",$this->current_user->id);
		Template::set('gfusers', $gfusers);

		//Count following
		$count_user_following = array('user_id' => $this->current_user->id, 'followers.deleted' => 0); 
		$total_following =  $this->followers_model->count_by($count_user_following);
		Template::set('total_following', $total_following);

		//Count followers
		$count_user_followers = array('follower_id' => $this->current_user->id, 'followers.deleted' => 0); 
		$total_followers =  $this->followers_model->count_by($count_user_followers);
		Template::set('total_followers', $total_followers);

		// get user's crops
		$user_crops = $this->crop_model->get_user_limit_crops($this->current_user->id, 5, 0);
		$count_user_crops = array('user_id' => $this->current_user->id, 'crop.deleted' => 0); 
		$total_crops =  $this->crop_model->count_by($count_user_crops);
		Template::set('total_crops', $total_crops);
		Template::set('user_crops', $user_crops);

		// get user's crop offers
		$user_croffers = $this->croffer_model->get_user_limit_croffers($this->current_user->id, 5, 0);
		$count_user_croffers = array('user_id' => $this->current_user->id, 'crop_offer.deleted' => 0); 
		$total_croffers =  $this->croffer_model->count_by($count_user_croffers);
		Template::set('total_croffers', $total_croffers);
		Template::set('user_croffers', $user_croffers);

		// get the current user questions
		$data = array('user_id' => $this->current_user->id,'question_id' => 0); 
		$user_questions = $this->questions_model->find_all_by($data);
		Template::set('user_questions', $user_questions);
		$count_user_questions = array('user_id' => $this->current_user->id,'question_id' => 0 , 'questions.deleted' => 0); 
		$total_questions =  $this->questions_model->count_by($count_user_questions);
		Template::set('total_questions', $total_questions);

		Template::set_view('gfusers/gfusers/view_my_profile');
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
	public function following()
	{ 
		// Load index() for the left Bar data.
		$this->index();

		$following = $this->followers_model->get_following($this->current_user->id);
		Template::set('following', $following);

		Template::set_view('gfusers/gfusers/view_following');
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
	public function followers()
	{ 
		// Load index() for the left Bar data.
		$this->index();

		// Check to see if some of them you are following to.
		$following_data  = array('user_id' => $this->current_user->id, 'deleted' => 0 );
		$following = $this->followers_model->find_all_by($following_data);
		Template::set('following', $following);
		// print_r($following);

		$followers = $this->followers_model->get_followers($this->current_user->id);
		Template::set('followers', $followers);
		Template::set_view('gfusers/gfusers/view_followers');
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
	public function my_crops()
	{ 
		// Load index() for the left Bar data.
		$this->index();

		// get the current user crops
		$records = $this->crop_model->get_user_crops($this->current_user->id);
		Template::set('records', $records);

		Template::set_view('gfusers/gfusers/view_my_crops');
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
	public function my_crop_offers()
	{ 
		// Load index() for the left Bar data.
		$this->index();

		// get user's crop offers
		$records = $this->croffer_model->get_user_croffers($this->current_user->id);
		Template::set('records', $records);

		Template::set_view('gfusers/gfusers/view_my_crop_offers');
		Template::render('three_col');
	}

}