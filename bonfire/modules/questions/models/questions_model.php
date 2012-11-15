<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Questions_model extends BF_Model {

	protected $table		= "questions";
	protected $key			= "q_id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";

//--------------------------------------------------------------------

	/**
	*	Method: get_all_questions()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_all_questions($limit, $offset)
	{
		$this->db->select('users.id, users.username, questions.q_id, questions.question_id, questions.body, questions.details, questions.sub_category, questions.category, questions.created_on')
				->where('question_id',0)
				->where('is_answer',0)
				->limit($limit,$offset)
				->order_by("questions.created_on", "desc");

		$this->db->join('users', 'users.id = questions.user_id');
	
		return parent::find_all();
	}

//--------------------------------------------------------------------

	/**
	*	Method: get_all_questions_by()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_all_questions_by($catID = NULL, $limit, $offset)
	{
		$this->db->select('users.id, users.username, questions.q_id, questions.question_id, questions.body, questions.details, questions.sub_category, questions.category, questions.created_on')
				->where('category',$catID)
				->where('question_id',0)
				->limit($limit,$offset)
				->order_by("questions.created_on", "desc");

		$this->db->join('users', 'users.id = questions.user_id');
	
		return parent::find_all();
	}

//--------------------------------------------------------------------

	/**
	*	Method: get_my_questions()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_my_questions($id = NULL, $limit, $offset)
	{
		$this->db->select('users.id, users.username, questions.q_id, questions.question_id, questions.body, questions.details, questions.sub_category, questions.category, questions.created_on')
				->where('user_id',$id)
				->where('question_id',0)
				->limit($limit,$offset)
				->order_by("questions.created_on", "desc");

		$this->db->join('users', 'users.id = questions.user_id');
	
		return parent::find_all();
	}

//--------------------------------------------------------------------

	/**
	*	Method: get_my_answers()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_my_answers($id = NULL, $limit, $offset)
	{
		$this->db->select('users.id, users.username, questions.q_id, questions.question_id, questions.body, questions.details, questions.sub_category, questions.category, questions.created_on')
				->where('user_id',$id)
				->where('is_answer',1)
				->limit($limit,$offset)
				->order_by("questions.created_on", "desc");

		$this->db->join('users', 'users.id = questions.user_id');
	
		return parent::find_all();
	}

//--------------------------------------------------------------------

	/**
	*	Method: get_all_questions()
	*
	*	Get all mails from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_all_answers_ids()
	{
		$this->db->select('q_id, question_id')
				->where('is_answer',1);		

		return parent::find_all();
	}

//--------------------------------------------------------------------

}
