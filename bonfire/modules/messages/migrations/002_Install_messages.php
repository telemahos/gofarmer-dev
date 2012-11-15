<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_messages extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'to' => array(
				'type' => 'INT',
				'constraint' => 20,
				
			),
			'from' => array(
				'type' => 'INT',
				'constraint' => 20,
				
			),
			'attachment' => array(
				'type' => 'VARCHAR',
				'constraint' => 250,
				
			),
			'subject' => array(
				'type' => 'VARCHAR',
				'constraint' => 250,
				
			),
			'body' => array(
				'type' => 'LONGTEXT',
				
			),
			'box' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				
			),
			'date' => array(
				'type' => 'DATE',
				'default' => '0000-00-00',
				
			),
			'read' => array(
				'type' => 'INT',
				'constraint' => 1,
				
			),
			'sent_copy' => array(
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
		$this->dbforge->create_table('messages');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('messages');

	}

	//--------------------------------------------------------------------

}