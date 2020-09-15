<?php namespace App\Controllers;

use App\Models\Backup_model;

class Backup extends BaseController
{
	public function index()
	{
        $model = new Backup_model();
        $data['user3'] = $model->getBackup();
        //var_dump($model->getRoles());
        return view('backup/index',$data);
        }
        
        public function add()
        {
        return view('backup/add');
        }

        public function save()
        {
        $model = new Backup_model();
        $data = [
                'judul' => $this->request->getPost('judul'),
                'file' => $this->request->getPost('file'),
                'tgl_simpan' => $this->request->getPost('tgl_disimpan'),
                'disimpan_oleh' => $this->request->getPost('disimpan_oleh'),
        ];
        $model->saveBackup($data);
        return redirect()->to('/Backup');
        }
        public function edit($id)
        {
        $model = new Backup_model();
        $data['backup'] = $model->getBackup($id)->getRow();
        return view('backup/edit',$data);
        }
        public function view($id)
        {
        $model = new Backup_model();
        $data['backup'] = $model->getBackup($id)->getRow();
        return view('backup/view',$data);
        }

        public function update()
        {
        $model = new Backup_model();
        $id = $this->request->getPost('id');
        $data = ['judul' => $this->request->getPost('judul'),
                'file' => $this->request->getPost('file'),
                'tgl_simpan' => $this->request->getPost('tgl_simpan'),
                'disimpan_oleh' => $this->request->getPost('disimpan_oleh')



        ];
        
        $model->updateBackup($data,$id);
        return  redirect()->to('/backup');
        }

        public function delete($id)
        {
                try {
                        $model = new Backup_model();
                        $model->deleteBackup($id);
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/backup');
        }


}