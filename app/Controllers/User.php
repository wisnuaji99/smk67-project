<?php namespace App\Controllers;

use App\Models\User_model;
use App\Models\Role_model;
use App\models\User_roles_model;
use app\models\Surat_user_model;
use Config\Services;

class User extends BaseController
{
        protected $modul = 'user';
	public function index()
	{
        $model = new User_model();
        $data['users'] = $model->getUsers();
        $data['title'] = 'Users List';
        $data['arr'] = 'Users';
        Services::template('users/index', $data);
        
        }
        
        public function add()
        {
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form User';
        $modelRole = new Role_model();
        $data['roles'] = $modelRole->getRoles();
        Services::template('users/form', $data);
       
        }

        public function save()
        {
        $model = new User_model();
        $modelUserRole = new User_roles_model();
        $nik = $this->request->getPost('nik');
        $cek = $model->where('nik',$nik)->first();
        if ($cek) {
                session()->setFlashData('error', 'Tidak bisa tersimpan karena NIK sudah digunakan');
        } else {
        
                $data = [
                        'nik' => $this->request->getPost('nik'),
                        'name' => $this->request->getPost('name'),
                        'email' => $this->request->getPost('email'),
                        'password' => $this->request->getPost('password'),
                        'no_tel' => $this->request->getPost('no_tel'),
                ];
                $model->saveUser($data);
                $user_id = $model->insertID();
                $dataUser = [
                                'role_id' => $this->request->getPost('role'),
                                'user_id' => $user_id
                         ];
                $modelUserRole->saveUserRoles($dataUser);
                     
        }
        
        return redirect()->to('/user');
        }

        public function edit($id)
        {
        $model = new User_model();
        $data['user'] = $model->getUsers($id)->getRow();
        $data['urlmethod'] = $this->modul.'/update';
        $data['arr'] = 'Edit';
        $data['title'] = 'Form User';
        $modelRole = new Role_model();
        $data['roles'] = $modelRole->getRoles();
        Services::template('users/form',$data);
        }
        
        public function view($id)
        {
        $model = new User_model();
        $data['user'] = $model->getUsers($id)->getRow();
        $data['urlmethod'] = $this->modul;
        $data['arr'] = 'View';
        $data['v'] = "";
        $data['title'] = 'View User';
        $modelRole = new Role_model();
        $data['roles'] = $modelRole->getRoles();
        Services::template('users/form', $data);
        }

        
        public function update()
        {
        $model = new User_model();
        $modelUserRole = new User_roles_model();
        $nik = $this->request->getPost('nik');
        $cek = $model->where('nik',$nik)->first();
        if ($cek) {
                session()->setFlashData('error', 'Tidak bisa tersimpan karena NIK sudah digunakan');
        } else {

        if ($nik !== "") {
                $isiNik =  $nik;
        } else {

                $isiNik = $this->request->getPost('nik2');
        }
        $id = $this->request->getPost('id');
        $password  = $this->request->getPost('password');
        if ($password != "") {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        } else {
        $password_hash = $this->request->getPost('password2');
        }
        
        $data = ['nik' => $isiNik,
                 'name' => $this->request->getPost('name'),
                 'email' => $this->request->getPost('email'),
                 'password' => $password_hash,
                 'no_tel' => $this->request->getPost('no_tel'),];

                 $model->updateUser($data,$id);

                 $dataUser = [
                        'role_id' => $this->request->getPost('role'),
                 ];
                $modelUserRole->updateUserRoles($dataUser,$id);
                }

                 return  redirect()->to('/user');
                 
         
        }

        
        public function delete($id)
        {
                try {
                        $model = new User_model();
                        $modelUserRole = new User_roles_model();
                        $modelUserRole->deleteUserRoles($id);
                        $model->deleteUser($id);
                } catch (\Throwable $th) {
                        session()->setFlashData('error', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/user');
        }

       


}