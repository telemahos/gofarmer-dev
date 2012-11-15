<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class followers extends Authenticated_Controller {

	//--------------------------------------------------------------------


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('followers_model', null, true);
		$this->lang->load('followers');
		
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

		// $records = $this->followers_model->find_all();

		// Template::set('records', $records);
		// Template::render();
	}

	//--------------------------------------------------------------------

	/*
		Method: follow()

		Follow a person.
	*/
	public function follow()
	{
		// $followerID = $this->uri->segment(4);
		// Add a following person
		if ($insert_id = $this->save_followers())
		{
			// Log the activity
			$this->activity_model->log_activity($this->current_user->id, lang('followers_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'followers');

			Template::set_message(lang('followers_create_success'), 'success');
			redirect('/gfusers/all_gfusers');
		}
		else
		{
			Template::set_message(lang('followers_create_failure') . $this->followers_model->error, 'error');
		}


		$records = $this->followers_model->find_all();

		Template::set('records', $records);
		Template::render();
	}

	//--------------------------------------------------------------------

	/*
		Method: unFollow()

		Unfollow a person.
	*/
	public function unFollow()
	{
		$data = array();

		$data = array('user_id' => $this->current_user->id , 'follower_id' => $this->uri->segment(4));
		$this->followers_model->delete_where($data);

		Template::set_message(lang('followers_delete_success'), 'success');
		redirect('/gfusers/all_gfusers');
	}

	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: save_followers()

		Does the actual validation and saving of form data.

		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.

		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_followers($type='insert', $id=0)
	{		
		$data = array();
		
		$data['user_id']        = $this->current_user->id;
		$data['follower_id']        = $this->uri->segment(4);
		$data['block']        = 0;

		//Check to see if this user follows a deleted releation.
		$follower_data = array('user_id' => $this->current_user->id, 'follower_id' => $this->uri->segment(4) , 'deleted' => 1 );
		$is_follower = $this->followers_model->find_by($follower_data);
		// if ther was now connection between them, then...
		if(empty($is_follower)) {
			$id = $this->followers_model->insert($data);

			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		// if there was a soft delete, then update it to Zero 0.
		else {
			$delete_data = array('deleted' => 0);
			$where_data = $is_follower->foll_id;
			$return = $this->followers_model->update($where_data, $delete_data);
		}

		return $return;
	}

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------

	/*
		Method: delete_followers()

		Does the actual validation and saving of form data.

	*/
	private function delete_followers()
	{
		$data = array();
		$data = array('user_id' => $this->current_user->id , 'follower_id' => $this->uri->segment(4));

		$this->followers_model->delete_where($data);
	}

	//--------------------------------------------------------------------

}