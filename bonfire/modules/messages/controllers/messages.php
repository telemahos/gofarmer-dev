<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class messages extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('messages_model', null, true);
		$this->lang->load('messages');

		// Load the gfusers MODULE
		$this->load->module('gfusers');

		// Count all the emails that are not read yet
		$count_inbox_mails = $this->messages_model->count_inbox_mails($this->current_user->id);
		Template::set('count_inbox_mails', $count_inbox_mails);

		// Count all the emails that are not read yet and send
		$count_send_mails = $this->messages_model->count_send_mails($this->current_user->id);
		Template::set('count_send_mails', $count_send_mails);

		// Count all the emails that are deleted in trash
		$count_trash_mails = $this->messages_model->count_trash_mails($this->current_user->id);
		Template::set('count_trash_mails', $count_trash_mails);

		Template::set_block('sidebar_left', 'messages/messages/sidebar_left');
		Template::set_block('sidebar_right', 'messages/messages/sidebar_right');

			
			Assets::add_js($this->load->view('messages/messages/messages_js', null, true), 'inline');

			Assets::add_js( array ( Template::theme_url('js/jquery.dataTables.min.js' )) );
			Assets::add_js( array ( Template::theme_url('js/bootstrap-dataTables.js' )) );
			
			Assets::add_css( array ( Template::theme_url('css/datatable.css') ) ) ;
			Assets::add_css( array ( Template::theme_url('css/bootstrap-dataTables.css') ) ) ;	

			Assets::add_module_js('messages', 'messages.js');
			// Assets::add_js(Template::theme_url('js/editors/ckeditor/ckeditor.js'));
			Assets::add_css('ui-lightness/jquery-ui-1.9.2.custom.css');
			Assets::add_js('js/jquery-ui-1.9.2.custom.min.js');

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
	public function index()
	{

		$records = $this->messages_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------

	/*
		Method: mails()

		Displays a list of form data.
	*/
	public function mails($offset = 0)
	{
		$limit = 10;	
		//Count the messages
		$total = array('to' => $this->current_user->id,'box' => 'INBOX', 'messages.deleted' => 0); 
		// $total_records = $this->messages_model->count_by($total);
		$total_records =  $this->messages_model->count_by($total);
		// echo "total_records" . $total_records;
		// show the messages
		$records = $this->messages_model->get_user_mails($this->current_user->id, $limit, $offset);
		// PAGINATION
		$config = array();
		$config['base_url'] 			= site_url("messages/mails");
		$config['total_rows'] 			= $total_records;
		$config['per_page'] 			= $limit;
		$config['page_query_string']	= FALSE;
		$config['uri_segment'] 			= 3;
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





		// get the current user mails
		// $records = $this->messages_model->get_user_mails($this->current_user->id);
		

		Template::set('records', $records);		
		Template::set_view('messages/messages/mails');
		Template::render('three_col');
	}

	//--------------------------------------------------------------------

	/*
		Method: send_mails()

		Displays a list of form data.
	*/
	public function send_mails($offset = 0)
	{
		$limit = 10;	
		//Count the messages
		$total = array('from' => $this->current_user->id,'box' => 'SEND', 'messages.deleted' => 0); 
		// $total_records = $this->messages_model->count_by($total);
		$total_records =  $this->messages_model->count_send_mails($this->current_user->id);
		// show the messages
		$records = $this->messages_model->get_user_send_mails($this->current_user->id, $limit, $offset);
		
		// PAGINATION
		$config = array();
		$config['base_url'] 			= site_url("messages/send_mails");
		$config['total_rows'] 			= $total_records;
		$config['per_page'] 			= $limit;
		$config['page_query_string']	= FALSE;
		$config['uri_segment'] 			= 3;
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
		// $records['pagination'] = $this->pagination->create_links();
		// $data['total_rows'] = $total_records;

		// Template::set('data', $data);
		Template::set('records', $records);
		Template::set_view('messages/messages/send_mails');
		Template::render('three_col');
	}

	//--------------------------------------------------------------------

	/*
		Method: delete_mail()

		Delete the chosen mail .
	*/
	public function delete_mail()
	{
		$data = array( 'msg_id' => $this->uri->segment(4));
		if ($this->messages_model->delete_where($data))
		{
			// Log the activity
			$this->activity_model->log_activity($this->current_user->id, lang('messages_act_delete_record').': ' . $this->uri->segment(4) . ' : ' . $this->input->ip_address(), 'messages');

			Template::set_message(lang('messages_delete_success'), 'success');

			redirect('/messages/messages/mails');
		} else
		{
			Template::set_message(lang('messages_delete_failure') . $this->messages_model->error, 'error');
		}
		// $data = array( 'msg_id' => $this->uri->segment(4));
		// // get the current user mails
		// $this->messages_model->delete_where($data);
		

		// Template::set('records', $records);		
		// Template::redirect('/messages/messages/mails');
		// Template::render('three_col');
	}

	//--------------------------------------------------------------------

	/*
		Method: delete_mails()

		Displays a list of form data.
	*/
	public function delete_mails()
	{
		// get the current user mails
		$records = $this->messages_model->get_user_delete_mails($this->current_user->id);
		

		Template::set('records', $records);		
		Template::set_view('messages/messages/delete_mails');
		Template::render('three_col');
	}

	//--------------------------------------------------------------------

	/*
		Method: read_mail()

		Displays a list of form data.
	*/
	public function read_mail()
	{

		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_messages())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('messages_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'messages');

				Template::set_message(lang('messages_create_success'), 'success');
				// Template::redirect('/messages/messages');
			}
			else
			{
				Template::set_message(lang('messages_create_failure') . $this->messages_model->error, 'error');
			}
		}

		$records = $this->messages_model->read_mail($this->uri->segment(4),$this->current_user->id);
		// Mark as read mail
		$data = array();
		$data['read'] = 1;
		$this->messages_model->update_where('msg_id', $this->uri->segment(4), $data);

		Template::set('records', $records);
		Template::set_view('messages/messages/read_mail');
		Template::render('three_col');
	}

	//--------------------------------------------------------------------

	/*
		Method: write_mail()

		Displays a list of form data.
	*/
	public function write_mail()
	{
		if ($this->input->post('save'))
		{
			if ($insert_id = $this->save_messages())
			{
				// Log the activity
				$this->activity_model->log_activity($this->current_user->id, lang('messages_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'messages');

				Template::set_message(lang('messages_create_success'), 'success');
				Template::redirect('/messages/messages/mails');
			}
			else
			{
				Template::set_message(lang('messages_create_failure') . $this->messages_model->error, 'error');
			}
		}
		$this->load->model('gfusers_model', null, true);
		$users = $this->user_model->find_all();
		Template::set('users', $users);

		Template::set_view('messages/messages/write_mail');
		Template::render('three_col');
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
		// $this->form_validation->set_rules('messages_attachment','Attachment','trim|xss_clean|max_length[250]');
		$this->form_validation->set_rules('messages_subject','Subject','trim|xss_clean|max_length[250]');
		$this->form_validation->set_rules('messages_body','Body','trim|xss_clean');
		// $this->form_validation->set_rules('messages_box','Box','trim|xss_clean|max_length[100]');
		// $this->form_validation->set_rules('messages_date','Date','trim|xss_clean');
		// $this->form_validation->set_rules('messages_read','Read','trim|xss_clean|max_length[1]');
		// $this->form_validation->set_rules('messages_sent_copy','Sent_copy','trim|xss_clean|max_length[1]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}

		// make sure we only pass in the fields we want
		
		$data = array();
		$data['to']        = $this->input->post('messages_to');
		$data['from']        = $this->input->post('messages_from');
		// $data['attachment']        = $this->input->post('messages_attachment');
		$data['attachment']        = "";
		$data['subject']        = $this->input->post('messages_subject');
		$data['body']        = $this->input->post('messages_body');
		// $data['box']        = $this->input->post('messages_box');
		$data['box']        = "INBOX";
		// $data['date']        = $this->input->post('messages_date') ? $this->input->post('messages_date') : '0000-00-00';
		$data['date']        = date('Y-m-d H:i:s');
		$data['read']        = 0;
		$data['sent_copy']        = 0;

		if ($type == 'insert')
		{
			$id = $this->messages_model->insert($data);
			$data['box']        = "SEND";
			$data['sent_copy']        = 1;
			$this->messages_model->insert($data);

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