<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TemplateSeeder extends Seeder
{
	public function run()
	{
		$data1 = [
            'nomor' => '21',
            'sifat'  => 'surat resmi',
            'lampiran' => ' surat pengunduran diri',
            'hal' => ' berisi surat pemberitahuan',
            'tgl_keluar' => '2019-02-01',
            'jabatan_penulis' => ' staff tata usaha',
            'user_id' => 15,
            'created_by' => 'irvan'
        ];

        $data2 = [
            'nomor' => '22',
            'sifat'  => 'surat tugas',
            'lampiran' => 'surat penugasan guru',
            'hal' => ' berisi surat penugasan',
            'tgl_keluar' => '2018-12-12',
            'jabatan_penulis' => 'wakil kepala sekolah',
            'user_id' => 14,
            'created_by' => 'wisnu'

        ];

        $data3 = [
            'nomor' => '25',
            'sifat'  => 'sangat penting',
            'lampiran' => 'surat ujian nasional',
            'hal' => 'pemberitahuan ujian nasional',
            'tgl_keluar' => '2020-05-17',
            'jabatan_penulis' => 'kepala sekolah',
            'user_id' => 15,
            'created_by' => 'lala'
        ];
        $data4 = [
            'nomor' => '12',
            'sifat'  => 'penting',
            'lampiran' => 'surat hasil ujian nasional',
            'hal' => 'hasil ujian nasional',
            'tgl_keluar' => ' 2020-05-25',
            'jabatan_penulis' => 'kepala sekolah',
            'user_id' => 16,
            'created_by' => 'dina'
        ];

        $this->db->table('template')->insert($data1);
        $this->db->table('template')->insert($data2);
        $this->db->table('template')->insert($data3);
        $this->db->table('template')->insert($data3);
	}
}
