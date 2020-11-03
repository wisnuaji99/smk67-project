<?php namespace App\Controllers;

use App\Models\Masuk_model;
use App\Models\Surat_model;
use App\Models\Backup_model;
use CodeIgniter\I18n\Time;
use Config\Services;

class Backup extends BaseController
{
        protected $modul = 'backup';
        public function __construct()
        {
                helper('form');
                helper('file');
                
        }

	public function index()
	{
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Backup';
        $modelBackup = new Backup_model();
        $data['backup'] = $modelBackup->getBackup();
        Services::template('backups/index', $data);
        }
        
        public function add()
        {
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Tambah Surat Masuk';
        Services::template('backups/form', $data);
        }

        public function save()
        {
        $model = new Backup_model();
        $waktu = new Time('now', 'Asia/Jakarta', 'en_ID');
        $nomor_surat = $this->request->getPost('nomor');
        $file = $this->request->getFile('file');
        $penerima = session('name');
        //var_dump($penerima);die();
        if ($_FILES) {
              $file->move(ROOTPATH.'public/uploads');
              $getFile =  $file->getName();
              
        } else {
              $getFile = NULL;
        }
        
        $data = [
            'nomor' => $this->request->getPost('nomor'),
            'judul' => $this->request->getPost('judul'),
            'file' => $getFile,
            'tgl_simpan' => $waktu,
            'disimpan_oleh' => $penerima,
        ];
        $model->saveBackup($data);
        session()->setFlashData('warning', 'Berhasil Menyimpan Data Backup');
        return redirect()->to('/backup');
        }

        public function edit($id)
        {
        $model = new Backup_model();
        $data['urlmethod'] = $this->modul.'/update';
        $data['arr'] = 'Add';
        $data['title'] = 'Form Edit Backup';
        $modelRole = new Backup_model();
        $data['backup'] = $model->getBackup($id)->getRow();
        Services::template('backups/form', $data);
        }

        public function view($id)
        {
        $model = new Backup_model();
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'Add';
        $data['title'] = 'Form View Surat';
        $data['v'] = "";
        $data['backup'] = $model->getBackup($id)->getRow();
        Services::template('backups/form', $data);
        }

        public function update()
        {
        //var_dump($_FILES);die();
        $model = new Backup_model();
        $id = $this->request->getPost('id');
        $nomor_surat = $this->request->getPost('nomor');
        $cek = $model->where('id',$id)->first();
        $file = $this->request->getFile('file');
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
        
        $model->updateBackup($data,$id);
        session()->setFlashData('info', 'Berhasil Mengupdate Data');
     
        return  redirect()->to('/backup');
        }

        public function delete($id)
        {
                try {
                        $model = new Backup_model();
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
                        
                       $model->deleteBackup($id);
                      
                        session()->setFlashData('error', 'Berhasil Menghapus Data');
                        //var_dump(session()->getFlashData('error'));die();
                        return redirect()->to('/backup');

                } catch (\Throwable $th) {
                        
             
                        session()->setFlashData('error', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                        return redirect()->to('/backup');

                }
        }


}