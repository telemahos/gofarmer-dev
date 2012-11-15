<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_crop extends Migration {

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
				'type' => 'INT',
				'constraint' => 10,
				
			),
			'crop' => array(
				'type' => 'VARCHAR',
				'constraint' => 250,
				
			),
			'variety' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'hectar' => array(
				'type' => 'INT',
				'constraint' => 10,
				
			),
			'certification' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'conventional_crops' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'integrated_crop' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'organic' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'comment' => array(
				'type' => 'TEXT',
				
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
		$this->dbforge->create_table('crop');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('crop');

	}

	//--------------------------------------------------------------------

}