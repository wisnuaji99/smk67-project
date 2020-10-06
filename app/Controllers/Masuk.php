<?php namespace App\Controllers;

use App\Models\Masuk_model;
use App\Models\Surat_user_model;
use App\Models\User_model;
use CodeIgniter\I18n\Time;
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
        //var_dump($modelMasuk->getMasuk());die();
        $data['masuk'] = $modelMasuk->getMasuk();
        Services::template('masuks/index', $data);
        }
        
        public function add()
        {
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $modelUser = new User_model();
        $data['users'] = $modelUser->getUsers();
        $data['title'] = 'Form Tambah Surat Masuk';
        Services::template('masuks/form', $data);
        }

        public function save()
        {
        $model = new Masuk_model();
        $modelSurat =  new Surat_user_model();
        $file = $this->request->getFile('file');
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');

        if ($file !== NULL) {
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
        $idBaru = $model->insertID();

        $users = $this->request->getPost('users');
        if ($users) {
          for ($i=0; $i < count($users) ; $i++) { 
                  
                $dataUser = [
                        'surat_id' => $idBaru,
                        'user_id' => $users[$i],
                        'tgl_kirim' => $myTime,
                        'pengirim' => session('name'),
                    ];
                    $modelSurat->saveMasukUser($dataUser);
          }

        }
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
        $modelUser = new User_model();
        $data['users'] = $modelUser->getUsers();
        //
        Services::template('masuks/form', $data);
        }

        public function view($id)
        {
        $model = new Masuk_model();
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form View Surat';
        $data['v'] = "";
        $modelRole = new Masuk_model();
        $data['masuk'] = $model->getMasuk($id)->getRow();
        Services::template('masuks/form', $data);
        }

        public function update()
        {
               // var_dump($this->request->getPost('users'));die();
        $model = new Masuk_model();
        $id = $this->request->getPost('id');
        $modelSurat =  new Surat_user_model();
        
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');
        $cek = $model->where('id',$id)->first();
        if ($_FILES) {
                $file = $this->request->getFile('file');
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

        $users = $this->request->getPost('users');
        $tgl_kirim = $this->request->getPost('tgl_kirim');
        if ($users) {
          for ($i=0; $i < count($users) ; $i++) { 
                  
                $dataUser = [
                
                        'user_id' => $users[$i],
                        'tgl_kirim' => $myTime,
                        'pengirim' => session('name'),
                    ];
                    $modelSurat->updateMasukUser($dataUser,$id,$tgl_kirim);
          }

        }
        return  redirect()->to('/masuk');
        }
        
        public function delete($id)
        {
                try {
                        $model = new Masuk_model();
                        $modelSurat =  new Surat_user_model();
                        $suratUser = $modelSurat->getSuratUser($id)->getRow();
                        $cek = $model->where('id',$suratUser->id)->first();
                        if ($cek["file"] !== "") {
                                unlink(ROOTPATH.'public/uploads/'.$cek["file"]);
                        }
                        $model->deleteMasuk($cek["id"]);
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/masuk');
        }

}