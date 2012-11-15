<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Questions.Content.View');
		$this->load->model('questions_model', null, true);
		$this->lang->load('questions');
		
		Template::set_block('sub_nav', 'content/_sub_nav');
	}

	//--------------------------------------------------------------------



	/*
		Method: index()

		Displays a list of form data.
	*/
	public function index()
	{

		// Deleting anything?
		if (isset($_POST['delete']))
		{
			$checked = $this->input->post('checked');

			if (is_array($checked) && count($checked))
			{
				$result = FALSE;
				foreach ($checked as $pid)
				{
					$result = $this->questions_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('questions_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('questions_delete_failure') . $this->questions_model->error, 'error');
				}
			}
		}

		$records = $this->questions_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Questions');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Questions object.
	*/
	public function create()
	{
		$this->auth->restrict('Questions.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_questions())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('questions_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'questions');

				Template::set_message(lang('questions_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/questions');
			}
			else
			{
				Template::set_message(lang('questions_create_failure') . $this->questions_model->error, 'error');
			}
		}
		Assets::add_module_js('questions', 'questions.js');

		Template::set('toolbar_title', lang('questions_create') . ' Questions');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Questions data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('questions_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/questions');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Questions.Content.Edit');

			if ($this->save_questions('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('questions_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'questions');

				Template::set_message(lang('questions_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('questions_edit_failure') . $this->questions_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Questions.Content.Delete');

			if ($this->questions_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('questions_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'questions');

				Template::set_message(lang('questions_delete_success'), 'success');

				redirect(SITE_AREA .'/content/questions');
			} else
			{
				Template::set_message(lang('questions_delete_failure') . $this->questions_model->error, 'error');
			}
		}
		Template::set('questions', $this->questions_model->find($id));
		Assets::add_module_js('questions', 'questions.js');

		Template::set('toolbar_title', lang('questions_edit') . ' Questions');
		Template::render();
	}

	//--------------------------------------------------------------------


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

		
		$this->form_validation->set_rules('questions_question_id','Question ID','trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('questions_user_id','User ID','trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('questions_body','Body','trim|xss_clean');
		$this->form_validation->set_rules('questions_category','Category','trim|xss_clean|max_length[3]');
		$this->form_validation->set_rules('questions_sub_category','Sub Category','trim|xss_clean|max_length[5]');
		$this->form_validation->set_rules('questions_details','Details','trim|xss_clean');
		$this->form_validation->set_rules('questions_note','Note','trim|xss_clean');
		$this->form_validation->set_rules('questions_is_answer','Is Answer','trim|xss_clean|max_length[1]');
		$this->form_validation->set_rules('questions_is_private','Is Private','trim|xss_clean|max_length[1]');
		$this->form_validation->set_rules('questions_is_closed','Is Closed','trim|xss_clean|max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['question_id']        = $this->input->post('questions_question_id');
		$data['user_id']        = $this->input->post('questions_user_id');
		$data['body']        = $this->input->post('questions_body');
		$data['category']        = $this->input->post('questions_category');
		$data['sub_category']        = $this->input->post('questions_sub_category');
		$data['details']        = $this->input->post('questions_details');
		$data['note']        = $this->input->post('questions_note');
		$data['is_answer']        = $this->input->post('questions_is_answer');
		$data['is_private']        = $this->input->post('questions_is_private');
		$data['is_closed']        = $this->input->post('questions_is_closed');

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



}