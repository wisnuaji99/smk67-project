<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserRoleSeeder extends Seeder
{
	public function run()
	{
		$data1 = [
            'role_id' =>  1,
			'user_id' => 1,
        ];

        $data2 = [
            'role_id' => 4,
			'user_id' => 1,
        ];

        $data3 = [
            'role_id' => 4,
			'user_id' => 2,
		];
		$data4 = [
            'role_id' => 3,
			'user_id' => 2,
		];
		$data5 = [
            'role_id' => 1,
			'user_id' => 3,
		];
		$data6 = [
            'role_id' => 2,
			'user_id' => 3,
		];

        $this->db->table('user_roles')->insert($data1);
        $this->db->table('user_roles')->insert($data2);
		$this->db->table('user_roles')->insert($data3);
		$this->db->table('user_roles')->insert($data4);
		$this->db->table('user_roles')->insert($data5);
		$this->db->table('user_roles')->insert($data6);
	}
}
