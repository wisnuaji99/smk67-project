<?php namespace App\Controllers;

use App\Models\Role_model;

class Role extends BaseController
{
	public function index()
	{
        $model = new Role_model();
        $data['roles'] = $model->getRoles();
        //var_dump($model->getRoles());
        return view('roles/index',$data);
	}

      

        public function add()
        {
        return view('roles/add');
        }

        public function save()
        {
        $model = new Role_model();
        $data = ['name_role' => $this->request->getPost('role')];
        $model->saveRoles($data);
        return redirect()->to('/role');
        }

        public function edit($id)
        {
        $model = new Role_model();
        $data['role'] = $model->getRoles($id)->getRow();
        return view('roles/edit',$data);
        }

        public function view($id)
        {
        $model = new Role_model();
        $data['role'] = $model->getRoles($id)->getRow();
        return view('roles/view',$data);
        }
        public function update()
        {
        $model = new Role_model();
        $id = $this->request->getPost('id');
        $data = ['name_role' => $this->request->getPost('role')];
        $model->updateRoles($data,$id);
        return  redirect()->to('/role');
        }

        public function delete($id)
        {
                try {
                        $model = new Role_model();
                        $model->deleteRoles($id);
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/role');
        }
}