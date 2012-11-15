<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->auth->restrict('Messages.Content.View');
		$this->load->model('messages_model', null, true);
		$this->lang->load('messages');
		
			Assets::add_js(Template::theme_url('js/editors/ckeditor/ckeditor.js'));
			Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
			Assets::add_js('jquery-ui-1.8.13.min.js');
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
					$result = $this->messages_model->delete($pid);
				}

				if ($result)
				{
					Template::set_message(count($checked) .' '. lang('messages_delete_success'), 'success');
				}
				else
				{
					Template::set_message(lang('messages_delete_failure') . $this->messages_model->error, 'error');
				}
			}
		}

		$records = $this->messages_model->find_all();

		Template::set('records', $records);
		Template::set('toolbar_title', 'Manage Messages');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: create()

		Creates a Messages object.
	*/
	public function create()
	{
		$this->auth->restrict('Messages.Content.Create');

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_messages())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('messages_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'messages');

				Template::set_message(lang('messages_create_success'), 'success');
				Template::redirect(SITE_AREA .'/content/messages');
			}
			else
			{
				Template::set_message(lang('messages_create_failure') . $this->messages_model->error, 'error');
			}
		}
		Assets::add_module_js('messages', 'messages.js');

		Template::set('toolbar_title', lang('messages_create') . ' Messages');
		Template::render();
	}

	//--------------------------------------------------------------------



	/*
		Method: edit()

		Allows editing of Messages data.
	*/
	public function edit()
	{
		$id = $this->uri->segment(5);

		if (empty($id))
		{
			Template::set_message(lang('messages_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/messages');
		}

		if (isset($_POST['save']))
		{
			$this->auth->restrict('Messages.Content.Edit');

			if ($this->save_messages('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('messages_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'messages');

				Template::set_message(lang('messages_edit_success'), 'success');
			}
			else
			{
				Template::set_message(lang('messages_edit_failure') . $this->messages_model->error, 'error');
			}
		}
		else if (isset($_POST['delete']))
		{
			$this->auth->restrict('Messages.Content.Delete');

			if ($this->messages_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('messages_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'messages');

				Template::set_message(lang('messages_delete_success'), 'success');

				redirect(SITE_AREA .'/content/messages');
			} else
			{
				Template::set_message(lang('messages_delete_failure') . $this->messages_model->error, 'error');
			}
		}
		Template::set('messages', $this->messages_model->find($id));
		Assets::add_module_js('messages', 'messages.js');

		Template::set('toolbar_title', lang('messages_edit') . ' Messages');
		Template::render();
	}

	//--------------------------------------------------------------------


	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_messages()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_messages($type='insert', $id=0)
	{
		if ($type == 'update') {
			$_POST['id'] = $id;
		}

		
		$this->form_validation->set_rules('messages_to','To','trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('messages_from','From','trim|xss_clean|max_length[20]');
		$this->form_validation->set_rules('messages_attachment','Attachment','trim|xss_clean|max_length[250]');
		$this->form_validation->set_rules('messages_subject','Subject','trim|xss_clean|max_length[250]');
		$this->form_validation->set_rules('messages_body','Body','trim|xss_clean');
		$this->form_validation->set_rules('messages_box','Box','trim|xss_clean|max_length[100]');
		$this->form_validation->set_rules('messages_date','Date','trim|xss_clean');
		$this->form_validation->set_rules('messages_read','Read','trim|xss_clean|max_length[1]');
		$this->form_validation->set_rules('messages_sent_copy','Sent_copy','trim|xss_clean|max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['to']        = $this->input->post('messages_to');
		$data['from']        = $this->input->post('messages_from');
		$data['attachment']        = $this->input->post('messages_attachment');
		$data['subject']        = $this->input->post('messages_subject');
		$data['body']        = $this->input->post('messages_body');
		$data['box']        = $this->input->post('messages_box');
		$data['date']        = $this->input->post('messages_date') ? $this->input->post('messages_date') : '0000-00-00';
		$data['read']        = $this->input->post('messages_read');
		$data['sent_copy']        = $this->input->post('messages_sent_copy');

		if ($type == 'insert')
		{
			$id = $this->messages_model->insert($data);

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
			$return = $this->messages_model->update($id, $data);
		}

		return $return;
	}

	//--------------------------------------------------------------------



}