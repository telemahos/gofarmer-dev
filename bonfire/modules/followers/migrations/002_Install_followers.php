<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_followers extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'foll_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'user_id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				
			),
			'follower_id' => array(
				'type' => 'BIGINT',
				'constraint' => 20,
				
			),
			'block' => array(
				'type' => 'TINYINT',
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
		$this->dbforge->add_key('foll_id', true);
		$this->dbforge->create_table('followers');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('followers');

	}

	//--------------------------------------------------------------------

}