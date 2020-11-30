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
				 'unique'         => TRUE,
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
			'isi'       => [
				'type'           => 'TEXT',
			]	,
			'jabatan_penulis'       => [
				'type'           => 'VARCHAR',
				'constraint'	 => '45',
			]	,
			'user_id'       => [
				'type'           => 'INT',
				'constraint'	 => '45',
			]	,
			'created_by'       => [
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
