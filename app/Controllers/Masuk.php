<?php namespace App\Controllers;

use App\Models\Masuk_model;
use Config\Services;

class Masuk extends BaseController
{
        protected $modul = 'masuk';
        public function __construct()
        {
                helper('form');
                helper('file');
        }

	public function index()
	{
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Surat';
        $modelMasuk = new Masuk_model();
        $data['masuk'] = $modelMasuk->getMasuk();
        Services::template('masuks/index', $data);
        }
        
        public function add()
        {
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Tambah Surat Masuk';
        Services::template('masuks/form', $data);
        }

        public function save()
        {
        $model = new Masuk_model();
      
        $file = $this->request->getFile('file');

        if ($_FILES) {
              $file->move(ROOTPATH.'public/uploads');
              $getFile =  $file->getName();
        } else {
              $getFile = NULL;
        }
        
        $data = [
            'judul' => $this->request->getPost('judul'),
            'file' => $getFile,
            'status' => $this->request->getPost('status'),
        ];
        $model->saveMasuk($data);
        return redirect()->to('/masuk');
        }

        public function edit($id)
        {
        $model = new Masuk_model();
        $data['urlmethod'] = $this->modul.'/update';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Edit Surat';
        $modelRole = new Masuk_model();
        $data['masuk'] = $model->getMasuk($id)->getRow();
        Services::template('masuks/form', $data);
        }

        public function view($id)
        {
        $model = new Masuk_model();
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form View Surat';
        $data['v'] = "";
        $data['masuk'] = $model->getMasuk($id)->getRow();
        Services::template('masuks/form', $data);
        }

        public function update()
        {
        //var_dump($_FILES);die();
        $model = new Masuk_model();
        $id = $this->request->getPost('id');
        $cek = $model->where('id',$id)->first();
        $file = $this->request->getFile('file');
        if ($file !== NULL) {
                
                if ($cek["file"] !== "") {
                        unlink(ROOTPATH.'public/uploads/'.$cek["file"]);
                }
                
                $file->move(ROOTPATH.'public/uploads');
                $getFile = $file->getName();
        } else {
                $getFile = $cek["file"];
        }
        
        $data = ['judul' => $this->request->getPost('judul'),
                'file' => $getFile,
                'status' => $this->request->getPost('status'),

        ];
        
        $model->updateMasuk($data,$id);
        return  redirect()->to('/masuk');
        }
        
        public function delete($id)
        {
              var_dump($id);die();
                try {
                        $model = new Masuk_model();
                        $cek = $model->where('id',$id)->first();
                        var_dump($cek);die();
                        if ($cek["file"] !== "") {
                                unlink(ROOTPATH.'public/uploads/'.$cek["file"]);
                        }
                        $model->deleteMasuk($id);
                        return redirect()->to('/masuk');

                } catch (\Throwable $th) {
                        session()->setFlashData('error', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                        return redirect()->to('/masuk');

                }
        
        }

}