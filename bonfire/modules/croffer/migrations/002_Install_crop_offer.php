<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_crop_offer extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'user_id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				
			),
			'crop_id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				
			),
			'variety_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
			'quantity' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
			'quantity_type_id' => array(
				'type' => 'INT',
				'constraint' => 2,
				
			),
			'packaging_id' => array(
				'type' => 'INT',
				'constraint' => 2,
				
			),
			'quality_id' => array(
				'type' => 'INT',
				'constraint' => 2,
				
			),
			'price' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
			'release_date' => array(
				'type' => 'DATETIME',
				'default' => '0000-00-00 00:00:00',
				
			),
			'comment' => array(
				'type' => 'TEXT',
				
			),
			'image' => array(
				'type' => 'VARCHAR',
				'constraint' => 250,
				
			),
			'deleted' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				'default' => '0',
			),
			'created_on' => array(
				'type' => 'datetime',
				'default' => '0000-00-00 00:00:00',
			),
			'modified_on' => array(
				'type' => 'datetime',
				'default' => '0000-00-00 00:00:00',
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('crop_offer');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('crop_offer');

	}

	//--------------------------------------------------------------------

}