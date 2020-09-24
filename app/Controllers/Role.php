<?php namespace App\Controllers;

use App\Models\Role_model;
use Config\Services;


class Role extends BaseController
{

        protected $modul = 'role';

	public function index()
	{
        $model = new Role_model();
        $data['roles'] = $model->getRoles();
        $data['title'] = 'Roles List';
        $data['arr'] = 'Roles';
        Services::template('roles/index', $data);
        
	}

      

        public function add()
        {
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Role';
        Services::template('roles/form', $data);
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
        $data['urlmethod'] = $this->modul.'/update';
        $data['arr'] = 'Edit';
        $data['title'] = 'Form Role';
        Services::template('roles/form', $data);
        }

        public function view($id)
        {
        $model = new Role_model();
        $data['role'] = $model->getRoles($id)->getRow();
        $data['urlmethod'] = $this->modul;
        $data['arr'] = 'View';
        $data['v'] = "";
        $data['title'] = 'Role Detail';
        Services::template('roles/form', $data);
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
                        session()->setFlashData('error', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/role');
        }
}