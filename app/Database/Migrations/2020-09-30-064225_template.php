<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Template extends Migration
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
			 ]	,
			 'sifat'       => [
				'type'           => 'VARCHAR',
                 'constraint'     => '45',
			]	,
			'lampiran'       => [
				'type'           => 'VARCHAR',
                 'constraint'     => '45',
			]	,
			'hal'       => [
				'type'           => 'VARCHAR',
				'constraint'	 => '45',
			]	,
			'tgl_keluar'       => [
				'type'           => 'DATE',
			]	,
			'jabatan_penulis'       => [
				'type'           => 'VARCHAR',
				'constraint'	 => '45',
			]	,
		]);
		$this->forge->dropTable('template',TRUE);
		//$this->forge->addKey('id');
		//$this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');;
		$this->forge->createTable('template');
	
	
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
