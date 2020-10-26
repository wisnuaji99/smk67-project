<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratUser extends Migration
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
                 'constraint'     => '11',
			 ]	,
			 'surat_id'       => [
				'type'           => 'INT',
                 'constraint'     => '11',
			]	,
			'tgl_kirim'       => [
				'type'           => 'TIMESTAMP',
			]	,
			'pengirim'       => [
				'type'           => 'VARCHAR',
				'constraint'	 => '45',
			]	,
			'status'       => [
				'type'           => 'INT',
				'constraint'	 => '11',
			]	,
		]);
		$this->forge->dropTable('surat_user',TRUE);
		//$this->forge->addKey('id');
		//$this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');;
		$this->forge->createTable('surat_user');
	
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
