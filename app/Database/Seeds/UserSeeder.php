<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data1 = [
            'name' => 'Wisnu',
			'nik' => '35345678567',
			'email' => 'snuaji89@gmail.com',
			'no_tel'=> '083312093832',
			'password' => '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK',
			'role_id' => 3
        ];

        $data2 = [
            'name' => 'irvan',
			'nik' => '2343534645745',
			'email' => 'asisten91@gmail.com',
			'no_tel'=> '083312093832',
			'password' => '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK',
			'role_id' => 3
        ];

        $data3 = [
            'name' => 'Dina',
			'nik' => '96756565756',
			'email' => 'snuaji99@gmail.com',
			'no_tel'=> '083312093832',
			'password' => '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK',
			'role_id' => 1
		];
		
		$data4 = [
            'name' => 'Lala',
			'nik' => '987654321',
			'email' => 'snuaji99@gmail.com',
			'no_tel'=> '083312093832',
			'password' => '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK',
			'role_id' => 2
		];
		
		$data5 = [
            'name' => 'Agung',
			'nik' => '123456654321',
			'email' => 'snuaji99@gmail.com',
			'no_tel'=> '083312093832',
			'password' => '$2y$10$c6gaztHTng6q03oSn6LHfe4oLIg0q6N/LyTYC9gT1PKSfpkSUdmmK',
			'role_id' => 4
        ];

        $this->db->table('users')->insert($data1);
        $this->db->table('users')->insert($data2);
		$this->db->table('users')->insert($data3);
		$this->db->table('users')->insert($data4);
		$this->db->table('users')->insert($data5);
	}
}
