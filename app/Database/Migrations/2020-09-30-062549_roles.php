<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
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
		 	'name_role'       => [
                 'type'           => 'VARCHAR',
                 'constraint'     => '45',
        	 ]	,
			
		]);
		$this->forge->dropTable('roles',TRUE);
		//$this->forge->addKey('id');
		//$this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');;
		$this->forge->createTable('roles');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
