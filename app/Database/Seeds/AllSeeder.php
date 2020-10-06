<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
	public function run()
	{
        $this->call('UserSeeder');
        $this->call('RolesSeeder');
        $this->call('UserRoleSeeder');
        $this->call('SuratBackupSeeder');
        $this->call('SuratMasukSeeder');
        $this->call('SuratUserSeeder');
        $this->call('TemplateSeeder');
        $this->call('UserSmkSeeder');
	}
}
