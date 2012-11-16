<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Croffer_model extends BF_Model {

	protected $table		= "crop_offer";
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
	*	Method: get_user_croffers()
	*
	*	Get all crop offers of the list from thw current user.
	*
	* @param int $return_type Choose the type of return type. 0 - Object, 1 - Array
	*
	* @return mixed An array of objects/arrays representing the results, or FALSE on failure or empty set.
	*/
	public function get_user_croffers($user_id)
	{
		$this->db->select('*')->where('user_id',$user_id);

		$this->db->join('crop_crops', 'crop_crops.crop_crops_id = crop_offer.crop_id', 'left');
		$this->db->join('crop_variety', 'crop_variety.crop_variety_id = crop_offer.variety_id', 'left'); 

		return parent::find_all();
	}


}