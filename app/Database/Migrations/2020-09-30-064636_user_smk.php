<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserSmk extends Migration
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
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'role_id' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 25,
			],
			'no_tel' => [
				'type' => 'VARCHAR',
				'constraint' => 15,
			],
			
			

		]);
		$this->forge->dropTable('users_smk',TRUE);
		//$this->forge->addKey('id');
		//$this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');;
		$this->forge->createTable('users_smk');
	
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
