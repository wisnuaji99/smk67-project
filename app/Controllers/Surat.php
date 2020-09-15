<?php namespace App\Controllers;

class Surat extends BaseController
{
	public function index()
	{
		$data['title'] = "Aplikasi SMKN 67";
		$data['body'] = "ini adalah tab surat /surat";
		return view('helo',$data);
		// return view('welcome_message');
	}

    public function suratmasuk($nama)
    {
        $data['title'] =  "Jenis Surat";
        $data['body'] = $nama;
        return view('helo', $data);
    }

    public function jumlah($jumlah1, $jumlah2
    )
    {
        $data['title'] =  "jumlah surat";
        $data['body'] = $jumlah1 * $jumlah2  ;
        return view('helo', $data );
    }
	//--------------------------------------------------------------------

}