<?php namespace App\Controllers;

class Hello extends BaseController
{
	public function index()
	{
		$data['title'] = "Aplikasi SMKN 67";
		$data['body'] = "ini adalah route /hello";
		return view('helo',$data);
		// return view('welcome_message');
    }
    

    public function ambil()
	{
		$data['title'] = "Aplikasi SMKN 67";
		$data['body'] = "ini adalah route /hello/ambil";
		return view('helo',$data);
		// return view('welcome_message');
	}

	//--------------------------------------------------------------------

}