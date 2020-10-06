<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSmkSeeder extends Seeder
{
	public function run()
	{
		$data1 = [
            'name' => 'andi',
            'alamat'  => 'bogor',
            'role_id' => 4,
            'password' => 'andi123',
            'no_tel' => ' 0812121212'
        ];

        $data2 = [
            'name' => 'budi',
            'alamat'  => 'melayu',
            'role_id' => 3,
            'password' => 'budi123',
            'no_tel' => '081212121212'
        ];

        $data3 = [
            'name' => 'cindy',
            'alamat'  => 'rawamangun',
            'role_id' => 2,
            'password' => 'cindy123',
            'no_tel' => '081212121212'
		];
		$data4 = [
            'name' => 'testtest',
            'alamat'  => 'test',
            'role_id' => 4,
            'password' => 'NULL',
            'no_tel' => ' 323534546'
        ];

        $this->db->table('users_smk')->insert($data1);
        $this->db->table('users_smk')->insert($data2);
		$this->db->table('users_smk')->insert($data3);
		$this->db->table('users_smk')->insert($data4);
	}
}
