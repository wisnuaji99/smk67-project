<?php namespace App\Controllers;

class Guru extends BaseController
{
	public function index($nama, $umur)
	{
		$data['title'] =  "nama saya : ".$nama;
        $data['body'] = "umur saya".$umur ;
        return view('helo', $data );
		// return view('welcome_message');
	}

    public function suratmasuk($nama)
    {
        $data['title'] =  "Jenis Surat";
        $data['body'] = $nama;
        return view('helo', $data);
    }

    public function mengajar($guru, $waktu)
    {
        $data['title'] =  "guru matematika : ".$guru;
        $data['body'] = "mengajar matematika selama : ".$waktu ;
        return view('helo', $data );
    }
	//--------------------------------------------------------------------

}