<?php namespace App\Controllers;

use App\models\Template_model;
use App\Models\Masuk_model;
use App\Models\User_model;
use Config\Services;
use CodeIgniter\I18n\Time;

class Kerangka extends BaseController
{
    protected $modul = 'kerangka';
        public function __construct(){
        helper('form');
        helper('file');
}
    public function index()
    {
    $model = new Template_model();
    $data['user3'] = $model->getTemplate();
    //var_dump($model->getRoles());
    Services::template('templates/index',$data);
    }
    public function add($id)
        {
        $modelUser = new User_model();
        $modelMasuk = new Masuk_model();
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'add';
        $data['title'] = 'Form Tambah Surat Balasan'; 
        Services::template('templates/form',$data);
        }

        public function save()
        {
        $model = new Template_model();
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');
        $pengirim = session('name');
        $penerima = $this->request->getPost('penerima');
        $surat = $this->request->getPost('surat');
        $data = [
                'nomor' => $this->request->getPost('nomor'),
                'sifat' => $this->request->getPost('sifat'),
                'lampiran' => $this->request->getPost('lampiran'),
                'hal' => $this->request->getPost('hal'),
                'tgl_keluar' => $this->request->getPost('tgl_keluar'),
                'jabatan_penulis' => $this->request->getPost('jabatan_penulis'),
        ];
        $model->saveTemplate($data);
        session()->setFlashData('success', 'Berhasil Mensave Surat');
        return redirect()->to('/Template');
        }

        public function edit($id)
        {
        $model = new Template_model();
        $modelUser = new User_model();
        $modelMasuk = new Masuk_model();
        $data['users'] = $modelUser->getUsersGuru();
        $data['masuks'] = $modelMasuk->getMasuk();
        $data['urlmethod'] = $this->modul.'/update';
        $data['arr'] = 'add';
        $data['title'] = 'Form Edit Pembuatan ';
        $data['template'] = $model->getTemplate($id)->getRow();
        Services::template('templates/form',$data);
        }

        public function view($id)
        {
        $model = new Template_model();
        $data['urlmethod'] = $this->modul.'/save';
        $data['title'] = 'Form View Pengiriman Surat';
        $data['arr'] = 'add';
        $data['v'] = "";
        $data['template'] = $model->getTemplate($id)->getRow();
        Services::template('templates/form',$data);
        }

        public function update()
        {
        $model = new Template_model();
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');
        $pengirim = session('name');
        $penerima = $this->request->getPost('penerima');
        $surat = $this->request->getPost('surat');
        $id = $this->request->getPost('id');
        $data = [ 
                'nomor' => $this->request->getPost('nomor'),
                'sifat' => $this->request->getPost('sifat'),
                'lampiran' => $this->request->getPost('lampiran'),
                'hal' => $this->request->getPost('hal'),
                'tgl_keluar' => $this->request->getPost('tgl_keluar'),
                'jabatan_penulis' => $this->request->getPost('jabatan_penulis'),



        ];
        
        $model->updateTemplate($data,$id);
        session()->setFlashData('info', 'Berhasil Mengupdate Surat');
        return  redirect()->to('/template');
        }

        public function delete($id)
        {
                try {
                        $model = new Template_model();
                        $model->deleteTemplate($id);
                        session()->setFlashData('error', 'Berhasil Menghapus Data');
                        return redirect()->to('/template');
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                        return redirect()->to('/template');
                }
        
        return redirect()->to('/template');
        }

}