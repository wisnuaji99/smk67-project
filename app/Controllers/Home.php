<?php namespace App\Controllers;
use Config\Services;



class Home extends BaseController
{
	public function index()
	{
		
		$data['user'] = session()->get("name");
		Services::template('index',$data);
	}

	public function home()
	{
		echo "Selamat Datang";
	}
	//--------------------------------------------------------------------

}