<?php namespace App\Controllers;
use App\Models\Auth_model;

class Login extends BaseController
{

	public function __construct()
	{
		$this->auth = new Auth_model();
	}

	public function index()
	{
		echo view('layout/header');
		echo view('login');
		echo view('layout/footer_login');

	}

	public function proses()
	{
		$nik = htmlspecialchars($this->request->getPost('nik'));
		$password = htmlspecialchars($this->request->getPost('password'));
		$cek_login = $this->auth->cek_login($nik);

		if ( password_verify($password, $cek_login['password']) ) {

			session()->set("id", $cek_login['id']);
			session()->set("name", $cek_login['name']);
			session()->set("email", $cek_login['email']);
			session()->set("password", $cek_login['password']);
			session()->set("no_tel", $cek_login['no_tel']);
			session()->set("role_id", $cek_login['role_id']);
			return redirect()->to('/');
		} else {
			return redirect()->to('/login');
		}

		
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/login');
	}
	

}
