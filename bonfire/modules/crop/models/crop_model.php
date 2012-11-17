<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
	Class: News_model

	The central way to access and perform CRUD on news articles.
*/
class Crop_model extends BF_Model {

	protected $table		= "crop";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";


	public function __construct()
	{
		parent::__construct();
	}

	//--------------------------------------------------------------------

	/**
	*	Method: get_crop_list()
	*
	*	Get all crops of the list in the database.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_crop_list()
	{
		$query = $this->db->select('*')->get('crop_crops');
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		} else {
			return null;
		}
	}

	//--------------------------------------------------------------------

	/**
	*	Method: get_crop_list($crop_name)
	*
	*	Get all crops of the list in the database.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_crop_list_like($crop_name)
	{
		//$this->db->like('crops_gr', $crop_name, 'both');
		$query = $this->db->select('*')
								->like('crops_gr', $crop_name, 'both')
								->or_like('crops_en', $crop_name, 'both')
								->get('crop_crops');

		
		if ($query->num_rows() > 0)
		{
			//print_r($query);
			return $query->result_array();
			// return $query->result();
			// return $query->row_array();
		} else {
			return null;
		}
	}

	//--------------------------------------------------------------------

	/**
	*	Method: get_crop_list()
	*
	*	Get all crops of the list in the database.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_crop_variety_list($id)
	{
		$query = $this->db->select('*')->where('crop_id',$id)->get('crop_variety');
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		} else {
			return null;
		}
	}

	//--------------------------------------------------------------------

	/**
	*	Method: get_user_crops()
	*
	*	Get all crops of the list from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_user_crops($id = NULL)
	{
		// $this->db->select('crop.id, crop.user_id, crop.crop, crop.variety, crop.hectar, crop.certification, crop.comment, crop.deleted, crop.created_on, crop.modified_on, crop_crops.crop_crops_id, crop_crops.crops_gr,crop_crops.crops_en, crop_variety.crop_variety_id, crop_variety.crop_id, crop_variety.crop_variety_gr, crop_variety.crop_variety_en')->where('user_id',$id);
		$this->db->select('*')->where('user_id',$id);

		$this->db->join('crop_crops', 'crop_crops.crop_crops_id = crop.crop', 'left');
		$this->db->join('crop_variety', 'crop_variety.crop_variety_id = crop.variety', 'left'); 

		return parent::find_all();
	}

	//--------------------------------------------------------------------

	/**
	*	Method: get_user_crops()
	*
	*	Get all crops of the list from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_user_limit_crops($id = NULL, $limit, $offset)
	{
		$this->db->select('*')->where('user_id',$id)
								->limit($limit,$offset);

		$this->db->join('crop_crops', 'crop_crops.crop_crops_id = crop.crop', 'left');
		$this->db->join('crop_variety', 'crop_variety.crop_variety_id = crop.variety', 'left'); 

		return parent::find_all();
	}

	//--------------------------------------------------------------------

	/**
	*	Method: get_crop()
	*
	*	Find a single crop of the list from thw current user.
	*
	* @param int $id Choose ID from the single crop record
	* @param int $user_id Choose user_ID to check if the current user is the right user.
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_crop($user_id,$id)
	{
		$this->db->select('*')->where('id',$id)
							  	->where('user_id', $user_id);

		$this->db->join('crop_crops', 'crop_crops.crop_crops_id = crop.crop', 'left');
		$this->db->join('crop_variety', 'crop_variety.crop_variety_id = crop.variety', 'left'); 

		return parent::find();
	}

	//--------------------------------------------------------------------



}