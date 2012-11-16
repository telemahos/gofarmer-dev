<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Followers_model extends BF_Model {

	protected $table		= "followers";
	protected $key			= "foll_id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";

	//--------------------------------------------------------------------

	/**
	*	Method: get_user_croffers()
	*
	*	Get all crop offers of the list from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_following($user_id)
	{
		$following_data  = array('followers.user_id' => $user_id, 'followers.deleted' => 0 );
		$this->db->select('users.id, users.username, gfusers.name, gfusers.last_name, gfusers.image')->where($following_data);

		$this->db->join('users', 'users.id = followers.follower_id', 'left');
		$this->db->join('gfusers', 'gfusers.user_id = followers.follower_id', 'left'); 

		return parent::find_all();
	}

	//--------------------------------------------------------------------

	/**
	*	Method: get_user_croffers()
	*
	*	Get all crop offers of the list from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_followers($user_id)
	{
		$followers_data  = array('followers.follower_id' => $user_id, 'followers.deleted' => 0 );
		$this->db->select('users.id, users.username, gfusers.name, gfusers.last_name, gfusers.image')->where($followers_data);

		$this->db->join('users', 'users.id = followers.user_id', 'left');
		$this->db->join('gfusers', 'gfusers.user_id = followers.user_id', 'left'); 

		return parent::find_all();
	}
}
