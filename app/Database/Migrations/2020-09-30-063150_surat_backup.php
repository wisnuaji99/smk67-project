<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratBackup extends Migration
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
			'tgl_simpan'       => [
				'type'           => 'DATE',
			]	,
			'disimpan_oleh'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			]	,
		]);
		$this->forge->dropTable('surat_backup',TRUE);
		//$this->forge->addKey('id');
		//$this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');;
		$this->forge->createTable('surat_backup');
	}
	

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
