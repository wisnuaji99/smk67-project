<?php namespace App\Controllers;

use App\Models\User_model;
use App\Models\Role_model;

class User extends BaseController
{
	public function index()
	{
        $model = new User_model();
        $data['user3'] = $model->getUsers();
        //var_dump($model->getRoles());
        return view('user/index',$data);
        }
        
        public function add()
        {
        $modelRole = new Role_model();
        $data['roles'] = $modelRole->getRoles();
        return view('user/add', $data);
        }

        public function save()
        {
        $model = new User_model();
        $data = [
                'name' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'role_id' => $this->request->getPost('role'),
                'no_telp' => $this->request->getPost('no_telp'),
        ];
        $model->saveUser($data);
        return redirect()->to('/User');
        }

        public function edit($id)
        {
        $model = new User_model();
        $modelRole = new Role_model();
        $data['user'] = $model->getUsers($id)->getRow();
        $data['roles'] = $modelRole->getRoles();
       // var_dump($modelRole->getRoles()); die();
        return view('user/edit',$data);
        }
        
        public function view($id)
        {
        $model = new User_model();
        // var_dump($model->getUsers($id)->getRow());die();
        $data['user'] = $model->getUsers($id)->getRow();
        return view('user/view',$data);
        }

        
        public function update()
        {
        $model = new User_model();
        $id = $this->request->getPost('id');
        $data = ['name' => $this->request->getPost('nama'),
                 'alamat' => $this->request->getPost('alamat'),
                 'role_id' => $this->request->getPost('role'),
                 'no_telp' => $this->request->getPost('no_telp'),];

                 $model->updateUser($data,$id);
                 return  redirect()->to('/user');
                 
         
        }

        
        public function delete($id)
        {
                try {
                        $model = new User_model();
                        $model->deleteUser($id);
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/user');
        }

       


}