<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuratMasukSeeder extends Seeder
{
	public function run()
	{
		$data1 = [
            'judul' => 'surat1',
            'file'  => ' 2-932-1437 - Penyampaian SK No 429 ttg Kalender Akademik 2020-2021.pdf',
            'status' => '1'
        ];

        $data2 = [
            'judul' => 'surat2',
            'file'  => ' 09 - Surat Edaran ttg Petunjuk Pelaksanaan PJJ di UNJ.pdf',
            'status' => '2'
        ];

        $data3 = [
            'judul' => 'surat3',
            'file'  => ' 09 - A4-BI-RECRUITMENT FINAL.pdf_1.pdf',
            'status' => '3'
		];

        $this->db->table('surat_masuk')->insert($data1);
        $this->db->table('surat_masuk')->insert($data2);
		$this->db->table('surat_masuk')->insert($data3);
	}
}
