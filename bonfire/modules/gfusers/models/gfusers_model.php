<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gfusers_model extends BF_Model {

	protected $table		= "gfusers";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";

	var $gallery_path;
	var $gallery_path_url;

	public function __construct() {
		parent::__construct();

		$this->gallery_path = realpath(APPPATH . '../../assets/images/users');
		$this->gallery_path_url = base_url().'assets/images/users/';

	}

//--------------------------------------------------------------------
	/**
	*	Method: all_gfusers()
	*
	*	Get all users from thw Database.
	*/
	public function all_gfusers()
	{		
		$this->db->select('users.id, users.username, users.banned, users.display_name, users.active, users.email, gfusers.user_id, gfusers.name, gfusers.last_name, gfusers.image')
				->where('banned',0)
				->where('active',1)
				// ->limit($limit,$offset)
				->order_by("users.id", "asc");
		$this->db->join('users', 'users.id = gfusers.user_id');

		return parent::find_all();
	}

//--------------------------------------------------------------------

	/**
	*	Method: add_user_image()
	*
	*	Add new user image.
	*/
	public function add_user_image($user_id) {
		// echo $user_id;
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'file_name' => now() . '-' . $user_id,
			'max_size' => '500'
			
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();

		$user_info  = array('user_id'  => $user_id);
		$data = array('image' => $image_data['file_name']);

		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->gallery_path . '/thumbs',
			'maintain_ration' => true,
			'master_dim' => 'auto',
			// 'master_dim' => 'width',
			// 'master_dim' => 'height',
			'x_axis' => '0',
			'y_axis' => '50',
			'width' => '575',
			'height' => '575'
		);

		if($image_data['file_size'] == "") {
			/*echo "<br>1";*/
			$return = 'Problem'; 
			
		}
		else {	
			$this->load->library('image_lib', $config);
			// $this->image_lib->resize(); crop()
			if ( ! $this->image_lib->resize())
			{
			    echo $this->image_lib->display_errors();
			}

			$return = $this->gfusers_model->update($user_info, $data);
		}	
		return $return;	
	}


}
