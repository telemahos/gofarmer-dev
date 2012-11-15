<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_gfusers extends Migration {

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
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'last_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'comp_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'comp_description' => array(
				'type' => 'TEXT',
				
			),
			'comp_category' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'comp_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'website' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'address' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'city' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'state' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'zip' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				
			),
			'country' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				
			),
			'phone_1' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				
			),
			'phone_2' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				
			),
			'fax' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				
			),
			'is_farmer' => array(
				'type' => 'INT',
				'constraint' => 1,
				
			),
			'is_company' => array(
				'type' => 'INT',
				'constraint' => 1,
				
			),
			'is_user' => array(
				'type' => 'INT',
				'constraint' => 1,
				
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
		$this->dbforge->create_table('gfusers');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('gfusers');

	}

	//--------------------------------------------------------------------

}