<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unique'         => TRUE,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
		 	'nik'       => [
                 'type'           => 'VARCHAR',
                 'constraint'     => '100',
    	         'unique'         => TRUE,
        	 ]	,
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'no_tel' => [
				'type' => 'VARCHAR',
				'constraint' => 12,
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => 11,
			]
			

		]);
		//$this->forge->dropTable('users',TRUE);
		//$this->forge->addKey('id');
		$this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');;
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
