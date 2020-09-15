<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "Aplikasi SMKN 67";
		$data['body'] = "ini aplikasi bikinan saya";
		return view('helo',$data);
		// return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
