<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Messages_model extends BF_Model {

	protected $table		= "messages";
	protected $key			= "msg_id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";


//--------------------------------------------------------------------

	/**
	*	Method: get_user_mails()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_user_mails($id = NULL, $limit, $offset)
	{
		$this->db->select('*')->where('to',$id)
								->where('box','INBOX')
								->where('messages.deleted',0)
								->limit($limit,$offset)
								->order_by("date", "desc"); 

		$this->db->join('users', 'users.id = messages.from', 'left');
		// $this->db->join('crop_variety', 'crop_variety.crop_variety_id = crop.variety', 'left'); 

		return parent::find_all();
	}

//--------------------------------------------------------------------

	/**
	*	Method: get_user_send_mails()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_user_send_mails($id = NULL , $limit, $offset )
	{
		// $this->db->limit($limit, $offset); 
		$this->db->select('*')->where('from',$id)
								->where('box','SEND')
								->where('messages.deleted',0)
								->limit($limit,$offset)
								->order_by("date", "desc");
														
		$this->db->join('users', 'users.id = messages.from', 'left');

		return parent::find_all();
	}

//--------------------------------------------------------------------

	/**
	*	Method: get_user_delete_mails()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_user_delete_mails($id = NULL)
	{
		$this->db->select('*')
								->where('box','TRASH')
								->where('from',$id)
								->or_where('to',$id)
								->where('sent_copy',1)
								->order_by("date", "desc"); 

		$this->db->join('users', 'users.id = messages.from', 'left');
		// $this->db->join('crop_variety', 'crop_variety.crop_variety_id = crop.variety', 'left'); 

		return parent::find_all();
	}

//--------------------------------------------------------------------

	/**
	*	Method: read_mail()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function read_mail($msg_id,$user_id)
	{
		$this->db->select('*')->where('msg_id',$msg_id)
							->where('to',$user_id)
							->or_where('from',$user_id);

		$this->db->join('users', 'users.id = messages.from', 'left');

		return parent::find_by('msg_id',$msg_id);
	}//end read_mail()
//--------------------------------------------------------------------

	/**
	 * Returns the number of elements that match the field/value pair.
	 *
	 * @param string $id The field to search for.
	 *
	 * @return bool|int
	 */
	public function count_inbox_mails($id)
	{
		if (empty($id))
		{
			$this->error = $this->lang->line('bf_model_count_error');
			$this->logit('['. get_class($this) .': '. __METHOD__ .'] '. $this->lang->line('bf_model_count_error'));
			return FALSE;
		}

		$this->set_selects();

		$this->db->where('to', $id)
				->where('read', 0)
				->where('messages.deleted',0)
					-> where('box', 'INBOX');

		return (int)$this->db->count_all_results($this->table);

	}//end count_inbox_mails()

//--------------------------------------------------------------------

	/**
	 * Returns the number of elements that match the field/value pair.
	 *
	 * @param string $id The field to search for.
	 *
	 * @return bool|int
	 */
	public function count_send_mails($id)
	{
		if (empty($id))
		{
			$this->error = $this->lang->line('bf_model_count_error');
			$this->logit('['. get_class($this) .': '. __METHOD__ .'] '. $this->lang->line('bf_model_count_error'));
			return FALSE;
		}

		$this->set_selects();

		$this->db->where('from', $id)
				// ->where('read', 0)
					->where('messages.deleted',0)
					-> where('box', 'SEND');

		return (int)$this->db->count_all_results($this->table);

	}//end count_send_mails()

//--------------------------------------------------------------------

	/**
	 * Returns the number of elements that match the field/value pair.
	 *
	 * @param string $id The field to search for.
	 *
	 * @return bool|int
	 */
	public function count_trash_mails($id)
	{
		if (empty($id))
		{
			$this->error = $this->lang->line('bf_model_count_error');
			$this->logit('['. get_class($this) .': '. __METHOD__ .'] '. $this->lang->line('bf_model_count_error'));
			return FALSE;
		}

		$this->set_selects();

		$this->db->where('box', 'TRASH')
					->where('from', $id)
					->or_where('to', $id);
				// ->where('read', 0)
					

		return (int)$this->db->count_all_results($this->table);

	}//end count_send_mails()

//--------------------------------------------------------------------

	/**
	 * Returns the number of elements that match the field/value pair.
	 *
	 * @param string $id The field to search for.
	 *
	 * @return bool|int
	 */
	public function delete_mail($id)
	{
		if (empty($id))
		{
			$this->error = $this->lang->line('bf_model_count_error');
			$this->logit('['. get_class($this) .': '. __METHOD__ .'] '. $this->lang->line('bf_model_count_error'));
			return FALSE;
		}

		$this->set_selects();

		$this->db->where('box', 'TRASH')
					->where('from', $id)
					->or_where('to', $id);
				// ->where('read', 0)
					

		return (int)$this->db->count_all_results($this->table);

	}//end count_send_mails()

//--------------------------------------------------------------------

}
