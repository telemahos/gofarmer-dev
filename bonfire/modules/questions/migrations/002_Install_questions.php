<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_questions extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'q_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'question_id' => array(
				'type' => 'INT',
				'constraint' => 20,
				
			),
			'user_id' => array(
				'type' => 'INT',
				'constraint' => 20,
				
			),
			'body' => array(
				'type' => 'TEXT',
				
			),
			'category' => array(
				'type' => 'INT',
				'constraint' => 3,
				
			),
			'sub_category' => array(
				'type' => 'INT',
				'constraint' => 5,
				
			),
			'details' => array(
				'type' => 'TEXT',
				
			),
			'note' => array(
				'type' => 'TEXT',
				
			),
			'is_answer' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				
			),
			'is_private' => array(
				'type' => 'TINYINT',
				'constraint' => 1,
				
			),
			'is_closed' => array(
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
		$this->dbforge->add_key('q_id', true);
		$this->dbforge->create_table('questions');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('questions');

	}

	//--------------------------------------------------------------------

}