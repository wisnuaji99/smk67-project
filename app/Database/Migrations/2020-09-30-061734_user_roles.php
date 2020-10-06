<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserRoles extends Migration
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
		 	'user_id'       => [
                 'type'           => 'INT',
                 'constraint'     => '100',
        	 ]	,
			'role_id' => [
				'type' => 'INT',
				'constraint' => 100,
			],
			
		]);
		$this->forge->dropTable('user_roles',TRUE);
		//$this->forge->addKey('id');
		//$this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');;
		$this->forge->createTable('user_roles');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
