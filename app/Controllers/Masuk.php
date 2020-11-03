<?php namespace App\Controllers;

use App\Models\Masuk_model;
use App\Models\Surat_model;
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
        $data['title'] = 'Form Surat Backup';
        $modelMasuk = new Masuk_model();
        $data['masuk'] = $modelMasuk->getMasuk();
        Services::template('masuks/index', $data);
        }
        
        public function add()
        {
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Tambah Surat Backup';
        Services::template('masuks/form', $data);
        }

        public function save()
        {
        $model = new Masuk_model();
        $nomor_surat = $this->request->getPost('nomor');
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
            'nomor' => $this->request->getPost('nomor'),
            //'status' => $this->request->getPost('status'),
        ];
        $model->saveMasuk($data);
        session()->setFlashData('warning', 'Berhasil Menyimpan Data');
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
//var_dump($_FILES['file']['name']);die();
        $model = new Masuk_model();
        $id = $this->request->getPost('id');
        $nomor_surat = $this->request->getPost('nomor');
        $cek = $model->where('id',$id)->first();
       
        //var_dump($file);die();
        if ($_FILES['file']['name'] !== "") {
                $file = $this->request->getFile('file');
                if (file_exists(ROOTPATH.'public/uploads/'.$cek["file"])) {
                        unlink(ROOTPATH.'public/uploads/'.$cek["file"]);
                }
                
                $file->move(ROOTPATH.'public/uploads');
                $getFile = $file->getName();
        } else {
                $getFile = $cek["file"];
        }
        
        $data = ['judul' => $this->request->getPost('judul'),
                'file' => $getFile,
                'nomor' => $this->request->getPost('nomor'),
                //'status' => $this->request->getPost('status'),

        ];
        
        $model->updateMasuk($data,$id);
        session()->setFlashData('info', 'Berhasil Mengupdate Data');
     
        return  redirect()->to('/masuk');
        }
        
        public function delete($id)
        {
                try {
                        $model = new Masuk_model();
                        $suratModel = new Surat_model();
                        $surat = $suratModel->where('surat_id', $id)->first();
//  //var_dump($id);die();
//  var_dump($surat);die();
                        if ($surat== NULL) {
                                $cek = $model->where('id',$id)->first();
                        
                                if (file_exists(ROOTPATH.'public/uploads/'.$cek["file"])) {
                                        unlink(ROOTPATH.'public/uploads/'.$cek["file"]);
                                }
                        }
                        
                       $model->deleteMasuk($id);
                      
                        session()->setFlashData('error', 'Berhasil Menghapus Data');
                        //var_dump(session()->getFlashData('error'));die();
                        return redirect()->to('/masuk');

                } catch (\Throwable $th) {
                        
             
                        session()->setFlashData('error', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                        return redirect()->to('/masuk');

                }
        
        }

}