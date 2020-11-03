<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuratBackupSeeder extends Seeder
{
	public function run()
	{
		$data1 = [
            'judul' => 'surat izin cuti',
            'file'  => 'surat cuti.pdf',
            'tgl_simpan' => '2019-03-12',
            'disimpan_oleh' => 'staff tata usaha',
            'nomor' => '12131hj23987i'
        ];

        $data2 = [
            'judul' => 'surat kpk',
            'file'  => 'surat kpk.pdf',
            'tgl_simpan' => '2020-04-05',
            'disimpan_oleh' => 'kepala TU',
            'nomor' => '12131hj82374i'
        ];

        $data3 = [
            'judul' => 'staff tata usaha',
            'file'  => 'surat1.pdf',
            'tgl_simpan' => '2020-07-05',
            'disimpan_oleh' => 'kepala sekolah',
            'nomor' => '1282374131hji'
		];
		$data4 = [
            'judul' => ' tes11',
            'file'  => 'surat11.pdf',
            'tgl_simpan' => '2011-11-11',
            'disimpan_oleh' => '11',
            'nomor' => '122398748131hji'
        ];

        $this->db->table('surat_backup')->insert($data1);
        $this->db->table('surat_backup')->insert($data2);
		$this->db->table('surat_backup')->insert($data3);
		$this->db->table('surat_backup')->insert($data4);
	}
}
