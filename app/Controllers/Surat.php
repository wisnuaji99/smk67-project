<?php namespace App\Controllers;

use App\models\Surat_model;
use App\Models\Masuk_model;
use App\Models\User_model;
use Config\Services;
use CodeIgniter\I18n\Time;

class Surat extends BaseController
{
    protected $modul = 'surat';
    public function __construct(){
    helper('form');
    helper('file');   
    }
    
    public function index(){
            $data['arr'] = 'Letters Sent';
            $data['title'] = 'Form Pengiriman Surat'; 
            $model = new Surat_model();
            $data['surats'] = $model->getSurat();
            Services::template('surats/index',$data);
    }

    public function add(){
            $modelUser = new User_model();
            $modelMasuk = new Masuk_model();
            $data['users'] = $modelUser->getUsers();
            $data['masuks'] = $modelMasuk->getMasuk();
            $data['urlmethod'] = $this->modul.'/save';
            $data['arr'] = 'add';
            $data['title'] = 'Form Tambah Pengiriman Surat'; 
            Services::template('surats/form',$data);
    }

    public function save(){
        $model= new Surat_model();
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');
        $pengirim = session('name');
        $penerima = $this->request->getPost('penerima');
        $surat = $this->request->getPost('surat');

        for ($i=0; $i < count($penerima) ; $i++) { 
                $data =[
                        'surat_id' => $surat,
                        'user_id' => $penerima[$i],
                        'tgl_kirim' => $myTime,
                        'pengirim' => $pengirim,
                        'status' => 1,
                    ];
            
                $model->saveSurat($data);
        }
        session()->setFlashData('success', 'Berhasil Mensave Surat');
        return redirect()->to ('/surat');
    }

    public function edit($id){
        $model = new Surat_model();
        $modelUser = new User_model();
        $modelMasuk = new Masuk_model();
        $data['users'] = $modelUser->getUsers();
        $data['masuks'] = $modelMasuk->getMasuk();
        $data['urlmethod'] = $this->modul.'/update';
        $data['arr'] = 'add';
        $data['title'] = 'Form Edit Pengiriman Surat'; 
        $data['surat'] = $model->getSurat($id)->getRow();
        Services::template('surats/form',$data);
     }

        public function view($id){
        $model = new Surat_model();
        $data['urlmethod'] = $this->modul.'/save';
        $data['title'] = 'Form View Pengiriman Surat';
        $data['arr'] = 'add';
        $data['v'] = "";
        $data['surat'] = $model->getSurat($id)->getRow();
        Services::template('surats/form',$data);
    }

    public function update(){
        $model= new Surat_model();
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');
        $pengirim = session('name');
        $penerima = $this->request->getPost('penerima');
        $surat = $this->request->getPost('surat');
        $id = $this->request->getPost('id');

        for ($i=0; $i < count($penerima) ; $i++) { 
                $data =[
                        'surat_id' => $surat,
                        'user_id' => $penerima[$i],
                        'tgl_kirim' => $myTime,
                        'pengirim' => $pengirim,
                        'status' => 1,
                        ];
                    
                $model->updateSurat($data, $id);
        }
                session()->setFlashData('info', 'Berhasil Mengupdate Surat');
                return redirect()->to ('/surat');
    }

    public function delete($id){
        try {
                $model = new Surat_model();
                $model->deleteSurat($id);
                session()->setFlashData('error', 'Berhasil Menghapus Data');
                return redirect()->to('/surat');
        } catch (\Throwable $th) {
                session()->setFlashData('error', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                return redirect()->to('/surat');
        }
        
        
    }

    

}