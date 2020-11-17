<?php namespace App\Controllers;
use Config\Services;
use App\Models\Backup_model;
use App\Models\Masuk_model;
use App\Models\User_model;


class Home extends BaseController
{
	public function index()
	{
		$month = 2020;
		
		$modelBackup = new Backup_model();
		$modelUser = new User_model();
		$modelMasuk = new Masuk_model();
		$output = $modelBackup->getOutputMonthly($month);
		$month = [] ;
		$jumlah = [] ;
		foreach ($output as $key => $value) {
			array_push($month,$value["bulan"]);
		}
		foreach ($output as $key => $value) {
			array_push($jumlah,$value["jumlah"]);
		}
		$data['amountinput'] =  $jumlah;
		 $data['monthinput'] = $month;
	//	var_dump();die();
		$data['sender'] = $modelUser->getSender() ;
		$data['receiver'] = $modelUser->getReceiver();
		$data['output'] = count($modelBackup->getBackup());
		$data['input'] = count($modelMasuk->getMasuk());
		$data['user'] = session()->get("name");
		Services::template('index',$data);
	}

	public function home()
	{
		echo "Selamat Datang";
	}
	//--------------------------------------------------------------------

}
