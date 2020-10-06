<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuratUserSeeder extends Seeder
{
	public function run()
	{
		$data1 = [
            'user_id' => 1,
            'surat_id'  => 1,
            'tgl_kirim' => '2020-09-28 10:12:31',
            'pengirim' => 'wisnu'
        ];

        $data2 = [
            'user_id' => 2,
            'surat_id'  => 2,
            'tgl_kirim' => '2019-11-11 10:10:31',
            'pengirim' => 'irvan'
        ];

        $data3 = [
            'user_id' => 3,
            'surat_id'  => 3,
            'tgl_kirim' => '2020-05-20 05:10:15',
            'pengirim' => 'gina'
        ];

        $this->db->table('surat_user')->insert($data1);
        $this->db->table('surat_user')->insert($data2);
		$this->db->table('surat_user')->insert($data3);
	}
}
