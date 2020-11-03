<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratMasuk extends Migration
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
			'nomor'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '200',
				'unique'         => TRUE,
			],
		 	'judul'       => [
                 'type'           => 'VARCHAR',
                 'constraint'     => '45',
			 ]	,
			 'file'       => [
				'type'           => 'TEXT',
			]	,
			'status'       => [
				'type'           => 'INT',
				'constraint'	 => '11',
			]	,
		]);
		$this->forge->dropTable('surat_masuk',TRUE);
		//$this->forge->addKey('id');
		//$this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');;
		$this->forge->createTable('surat_masuk');
	}
	

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
