<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class questions extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('questions_model', null, true);
		$this->lang->load('questions');

		// Load the gfusers MODULE
		$this->load->module('gfusers');

		// Load the messages MODULE
		$this->load->module('messages');

		$data = array('user_id' => $this->current_user->id,'question_id' => 0); 
		$data1 = array('user_id' => $this->current_user->id,'is_answer' => 1); 
		// Count all MY questions 
		$count_my_questions = $this->questions_model->count_by($data);
		Template::set('count_my_questions', $count_my_questions);

		// Count all MY answers 
		$count_my_answers = $this->questions_model->count_by($data1);
		Template::set('count_my_answers', $count_my_answers);

		// Count all the questions 
		$count_all_questions = $this->questions_model->count_by('question_id',0);
		Template::set('count_all_questions', $count_all_questions);

		// Count all the answers 
		$count_all_answers = $this->questions_model->count_by('is_answer',1);
		Template::set('count_all_answers', $count_all_answers);

		// Template::set_block('sidebar_left', 'questions/questions/sidebar_left');
		Template::set_block('sidebar_right', 'questions/questions/sidebar_right');

		Assets::add_module_js('questions', 'questions.js');
		// Load jQuery TimeAgo Plugin
		if ($this->auth->is_logged_in() === TRUE)
		{
			// Get current user Language
			$mylang = $this->current_user->language;
			Template::set('mylang', $mylang);
			if($this->current_user->language == "greek") {
				Assets::add_js( array ( Template::theme_url('js/jquery.timeago.gr.js' )) );
			} 
			else{
				Assets::add_js( array ( Template::theme_url('js/jquery.timeago.js' )) );
			}
		}
		
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index($offset = 0)
	{
		$limit = 5;
		$data = array('question_id' => 0); 
		//Count the messages
		$total_records =  $this->questions_model->count_by($data);
		$records = $this->questions_model->get_all_questions($limit, $offset);
		$answers = $this->questions_model->get_all_answers_ids();
		// print_r($answers);
		// PAGINATION
		$config = array();
		$config['base_url'] 			= site_url("questions/questions/questions");
		$config['total_rows'] 			= $total_records;
		$config['per_page'] 			= $limit;
		$config['page_query_string']	= FALSE;
		$config['uri_segment'] 			= 4;
		$config['num_links'] 			= 2;
		$config['use_page_numbers'] 	= FALSE;
		$config['display_pages'] 		= TRUE;

		//Some Style to Pagination
		$config['first_link'] = 'Πρώτη'; 
		$config['last_link'] = 'Τελευταία';
		$config['next_link'] = 'Επόμενη &gt;';
		$config['prev_link'] = '&lt; Προηγούμενη';
		$config['cur_tag_open'] = '<li class="active"><b><a>';
		$config['cur_tag_close'] = '</a></b></li>';

		$this->pagination->initialize($config);
		// print_r($records);

		Template::set('records', $records);
		Template::set('answers', $answers);
		Template::set_view('questions/questions/questions');
		Template::render('two_right');
	}

	//--------------------------------------------------------------------

	/*
		Method: write_question()

		Displays a list of form data.
	*/
	public function write_question()
	{

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_questions())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('questions_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'questions');

				Template::set_message(lang('questions_create_success'), 'success');
				Template::redirect('questions/questions/write_question');
			}
			else
			{
				Template::set_message(lang('questions_create_failure') . $this->questions_model->error, 'error');
			}
		}

		Template::set('toolbar_title', lang('questions_create') . ' Questions');
		Template::set_view('questions/questions/write_question');
		Template::render('two_right');
	}

	//--------------------------------------------------------------------

	/*
		Method: write_a_question()

		Displays a list of form data.
	*/
	public function write_a_question()
	{
		if ($this->input->post('save'))
		{
			$question = $this->input->post('msg_subject');
		}

		Template::set('question', $question);
		Template::set('toolbar_title', lang('questions_create') . ' Questions');
		Template::set_view('questions/questions/write_question');
		Template::render('two_right');
	}

	//--------------------------------------------------------------------

	/*
		Method: write_question()

		Displays a list of form data.
	*/
	public function read_question($offset = 0)
	{
		$limit = 4;	
		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_answer())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('questions_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'questions');

				Template::set_message(lang('questions_create_success'), 'success');
				// Template::redirect('questions/questions/read_question');
			}
			else
			{
				Template::set_message(lang('questions_create_failure') . $this->questions_model->error, 'error');
			}
		}

		// Get all Answers
		$this->db->select('users.id, users.username, questions.q_id, questions.question_id, questions.category,questions.sub_category, questions.body, questions.details, questions.created_on, questions.is_answer');
		$this->db->order_by("questions.created_on", "desc");
		$this->db->join('users', 'users.id = questions.user_id', 'left');
		$data1 = array('question_id' => $this->uri->segment(4), 'is_answer' => 1); 
		$answers = $this->questions_model->find_all_by($data1);
		// print_r($answers);

		// Get the Question
		$this->db->select('users.id, users.username, questions.q_id, questions.question_id, questions.category,questions.sub_category, questions.body, questions.details, questions.created_on');
		$this->db->join('users', 'users.id = questions.user_id', 'left');
		$data = array('q_id' => $this->uri->segment(4)); 
		$records = $this->questions_model->find_by($data);
		

		// print_r($records);
		Template::set('answers', $answers);
		Template::set('records', $records);
		Template::set('toolbar_title', lang('questions_create') . ' Questions');
		Template::set_view('questions/questions/read_question');
		Template::render('two_right');
	}// end of read_question

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_questions()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_questions($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['q_id'] = $id;
		}
		
		// $this->form_validation->set_rules('question_id','Question ID','trim|xss_clean|max_length[20]');
		// $this->form_validation->set_rules('user_id','User ID','trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('body','Body','trim|xss_clean');
		$this->form_validation->set_rules('category','Category','trim|xss_clean|max_length[3]');
		// $this->form_validation->set_rules('sub_category','Sub Category','trim|xss_clean|max_length[5]');
		$this->form_validation->set_rules('details','Details','trim|xss_clean');
		// $this->form_validation->set_rules('note','Note','trim|xss_clean');
		// $this->form_validation->set_rules('is_answer','Is Answer','trim|xss_clean|max_length[1]');
		// $this->form_validation->set_rules('is_private','Is Private','trim|xss_clean|max_length[1]');
		// $this->form_validation->set_rules('is_closed','Is Closed','trim|xss_clean|max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['question_id']        = 0;
		$data['user_id']        	= $this->current_user->id;
		$data['body']        		= $this->input->post('body');
		$data['category']        	= $this->input->post('category');
		$data['sub_category']        = 12;
		$data['details']        	= $this->input->post('details');
		$data['note']        		= "";
		$data['is_answer']        	= 0;
		// $data['is_private']        = $this->input->post('is_private');
		$data['is_private']        	= 0;
		$data['is_closed']        	= 0;

		if ($type == 'insert')
		{
			$id = $this->questions_model->insert($data);

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
			$return = $this->questions_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_answer()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_answer($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['q_id'] = $id;
		}
		
		// $this->form_validation->set_rules('question_id','Question ID','trim|xss_clean|max_length[20]');
		// $this->form_validation->set_rules('user_id','User ID','trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('body','Body','trim|xss_clean');
		// $this->form_validation->set_rules('category','Category','trim|xss_clean|max_length[3]');
		// $this->form_validation->set_rules('sub_category','Sub Category','trim|xss_clean|max_length[5]');
		// $this->form_validation->set_rules('details','Details','trim|xss_clean');
		// $this->form_validation->set_rules('note','Note','trim|xss_clean');
		// $this->form_validation->set_rules('is_answer','Is Answer','trim|xss_clean|max_length[1]');
		// $this->form_validation->set_rules('is_private','Is Private','trim|xss_clean|max_length[1]');
		// $this->form_validation->set_rules('is_closed','Is Closed','trim|xss_clean|max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['question_id']        = $this->input->post('question_id');
		$data['user_id']        	= $this->current_user->id;
		$data['body']        		= $this->input->post('body');
		$data['category']        	= $this->input->post('category');
		$data['sub_category']        = 12;
		$data['details']        	= $this->input->post('details');
		$data['note']        		= "";
		$data['is_answer']        	= 1;
		// $data['is_private']        = $this->input->post('is_private');
		$data['is_private']        	= 0;
		$data['is_closed']        	= 0;

		if ($type == 'insert')
		{
			$id = $this->questions_model->insert($data);

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
			$return = $this->questions_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------

	/*
		Method: all_questions()

		Displays a list of form data.
	*/
	public function all_questions($offset = 0)
	{
		$limit = 5;
		$data = array('question_id' => 0); 
		//Count the messages
		$total_records =  $this->questions_model->count_by($data);
		$records = $this->questions_model->get_all_questions($limit, $offset);
		$answers = $this->questions_model->get_all_answers_ids();
		// print_r($answers);
		// PAGINATION
		$config = array();
		$config['base_url'] 			= site_url("questions/questions/all_questions");
		$config['total_rows'] 			= $total_records;
		$config['per_page'] 			= $limit;
		$config['page_query_string']	= FALSE;
		$config['uri_segment'] 			= 4;
		$config['num_links'] 			= 2;
		$config['use_page_numbers'] 	= FALSE;
		$config['display_pages'] 		= TRUE;

		//Some Style to Pagination
		$config['first_link'] = 'Πρώτη'; 
		$config['last_link'] = 'Τελευταία';
		$config['next_link'] = 'Επόμενη &gt;';
		$config['prev_link'] = '&lt; Προηγούμενη';
		$config['cur_tag_open'] = '<li class="active"><b><a>';
		$config['cur_tag_close'] = '</a></b></li>';

		$this->pagination->initialize($config);
		// print_r($records);

		Template::set('records', $records);
		Template::set('answers', $answers);
		Template::set('total_records', $total_records);

		Template::set('toolbar_title', lang('questions_create') . ' Questions');
		Template::set_view('questions/questions/all_questions');
		Template::render('two_right');
	}

	//--------------------------------------------------------------------

	/*
		Method: all_questions()

		Displays a list of form data.
	*/
	public function all_questions_by_category()
	{
		$offset = $this->uri->segment(5);
		$limit = 2;
		$catID = $this->uri->segment(4);
		$data = array('question_id' => 0, 'category' => $catID); 
		//Count the messages
		$total_records =  $this->questions_model->count_by($data);
		$records = $this->questions_model->get_all_questions_by($catID, $limit, $offset);
		$answers = $this->questions_model->get_all_answers_ids();
		// print_r($answers);
		// TODO: Pagination is not working, while offset is confusing by catID.
		// PAGINATION
		$config = array();
		$config['base_url'] 			= site_url("questions/questions/all_questions_by_category/" .$catID);
		$config['total_rows'] 			= $total_records;
		$config['per_page'] 			= $limit;
		$config['page_query_string']	= FALSE;
		$config['uri_segment'] 			= 5;
		$config['num_links'] 			= 2;
		$config['use_page_numbers'] 	= FALSE;
		$config['display_pages'] 		= TRUE;

		//Some Style to Pagination
		$config['first_link'] = 'Πρώτη'; 
		$config['last_link'] = 'Τελευταία';
		$config['next_link'] = 'Επόμενη &gt;';
		$config['prev_link'] = '&lt; Προηγούμενη';
		$config['cur_tag_open'] = '<li class="active"><b><a>';
		$config['cur_tag_close'] = '</a></b></li>';

		$this->pagination->initialize($config);
		// print_r($records);

		Template::set('records', $records);
		Template::set('answers', $answers);
		Template::set('total_records', $total_records);

		Template::set('toolbar_title', lang('questions_create') . ' Questions');
		Template::set_view('questions/questions/all_questions_by_category');
		Template::render('two_right');
	}

	//--------------------------------------------------------------------

	/*
		Method: all_my_questions()

		Displays a list of form data.
	*/
	public function all_my_questions()
	{
		$offset = $this->uri->segment(4);
		$limit = 2;
		$id = $this->current_user->id;
		$data = array('question_id' => 0, 'user_id' => $id); 
		//Count the messages
		$total_records =  $this->questions_model->count_by($data);
		$records = $this->questions_model->get_my_questions($id, $limit, $offset);
		$answers = $this->questions_model->get_all_answers_ids();
		// print_r($answers);
		// TODO: Pagination is not working, while offset is confusing by catID.
		// PAGINATION
		$config = array();
		$config['base_url'] 			= site_url("questions/questions/all_my_questions/");
		$config['total_rows'] 			= $total_records;
		$config['per_page'] 			= $limit;
		$config['page_query_string']	= FALSE;
		$config['uri_segment'] 			= 4;
		$config['num_links'] 			= 2;
		$config['use_page_numbers'] 	= FALSE;
		$config['display_pages'] 		= TRUE;

		//Some Style to Pagination
		$config['first_link'] = 'Πρώτη'; 
		$config['last_link'] = 'Τελευταία';
		$config['next_link'] = 'Επόμενη &gt;';
		$config['prev_link'] = '&lt; Προηγούμενη';
		$config['cur_tag_open'] = '<li class="active"><b><a>';
		$config['cur_tag_close'] = '</a></b></li>';

		$this->pagination->initialize($config);
		// print_r($records);

		Template::set('records', $records);
		Template::set('answers', $answers);
		Template::set('total_records', $total_records);

		Template::set('toolbar_title', lang('questions_create') . ' Questions');
		Template::set_view('questions/questions/all_my_questions');
		Template::render('two_right');
	}

	//--------------------------------------------------------------------

	/*
		Method: all_my_answers()

		Displays a list of form data.
	*/
	public function all_my_answers()
	{
		$offset = $this->uri->segment(4);
		$limit = 2;
		$id = $this->current_user->id;
		$data = array('is_answer' => 1, 'user_id' => $id); 
		//Count the messages
		$total_records =  $this->questions_model->count_by($data);
		$records = $this->questions_model->get_my_answers($id, $limit, $offset);
		$answers = $this->questions_model->get_all_answers_ids();
		// print_r($answers);
		// TODO: Pagination is not working, while offset is confusing by catID.
		// PAGINATION
		$config = array();
		$config['base_url'] 			= site_url("questions/questions/all_my_answers/");
		$config['total_rows'] 			= $total_records;
		$config['per_page'] 			= $limit;
		$config['page_query_string']	= FALSE;
		$config['uri_segment'] 			= 4;
		$config['num_links'] 			= 2;
		$config['use_page_numbers'] 	= FALSE;
		$config['display_pages'] 		= TRUE;

		//Some Style to Pagination
		$config['first_link'] = 'Πρώτη'; 
		$config['last_link'] = 'Τελευταία';
		$config['next_link'] = 'Επόμενη &gt;';
		$config['prev_link'] = '&lt; Προηγούμενη';
		$config['cur_tag_open'] = '<li class="active"><b><a>';
		$config['cur_tag_close'] = '</a></b></li>';

		$this->pagination->initialize($config);
		// print_r($records);

		Template::set('records', $records);
		Template::set('answers', $answers);
		Template::set('total_records', $total_records);

		Template::set('toolbar_title', lang('questions_create') . ' Questions');
		Template::set_view('questions/questions/all_my_answers');
		Template::render('two_right');
	}

	//--------------------------------------------------------------------



}