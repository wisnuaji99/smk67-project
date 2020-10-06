<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
	public function run()
	{
		$data1 = [
            'name_role' => 'Operator'
        ];

        $data2 = [
            'name_role' => 'Kepala Sekolah',
        ];

        $data3 = [
            'name_role' => 'Guru',
		];
		$data4 = [
            'name_role' => 'Admin',
        ];

        $this->db->table('roles')->insert($data1);
        $this->db->table('roles')->insert($data2);
		$this->db->table('roles')->insert($data3);
		$this->db->table('roles')->insert($data4);
	}
}
