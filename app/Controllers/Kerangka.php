<?php namespace App\Controllers;

use App\models\Template_model;
use App\Models\User_model;
use Config\Services;

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
    $data['surats'] = $model->getTemplate();
    $data['arr'] = 'Request Letters';
    Services::template('templates/index',$data);
    }
    public function add($user_data_id)
    {
        $modelUser = new User_model();
        $data['urlmethod'] = $this->modul.'/save';
        $data['arr'] = 'add';
        $data['user_data_id'] = $user_data_id ;
        $data['title'] = 'Form Tambah Surat Balasan'; 
        Services::template('templates/form',$data);
    }

        public function save()
        {
        $model = new Template_model();
        $created_by = session('name');
        $id = $this->request->getPost('id');
        $user_id = $this->request->getPost('user_id');
        $user_data_id = $this->request->getPost('user_data_id');
        $nomor = $this->request->getPost('nomor');
        $sifat = $this->request->getPost('sifat');
        $lampiran = $this->request->getPost('lampiran');
        $perihal = $this->request->getPost('perihal');
        $isi = $this->request->getPost('isi');
        $tgl_keluar = $this->request->getPost('tgl_keluar');
        $jabatan_penulis = $this->request->getPost('jabatan_penulis');

        $data = [
                'user_id' => $user_data_id,
                'nomor' => $nomor,
                'sifat' => $sifat,
                'lampiran' => $lampiran,
                'hal' => $perihal,
                'isi' => $isi,
                'tgl_keluar' => $tgl_keluar,
                'jabatan_penulis' => $jabatan_penulis,
                'created_by' => $created_by,
        ];
        $model->saveTemplate($data);
        session()->setFlashData('success', 'Berhasil Mensave Surat');
        return redirect()->to('/kerangka');
        }

        public function edit($id)
        {
        $model = new Template_model();
        $data['urlmethod'] = $this->modul.'/update';
        $data['arr'] = 'Request Letters';
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
                $created_by = session('name');
                $id = $this->request->getPost('id');
                $user_id = $this->request->getPost('user_id');
                $user_data_id = $this->request->getPost('user_data_id');
                $nomor = $this->request->getPost('nomor');
                $sifat = $this->request->getPost('sifat');
                $lampiran = $this->request->getPost('lampiran');
                $perihal = $this->request->getPost('perihal');
                $isi = $this->request->getPost('isi');
                $tgl_keluar = $this->request->getPost('tgl_keluar');
                $jabatan_penulis = $this->request->getPost('jabatan_penulis');
        
                $data = [
                        'user_id' => $user_id,
                        'nomor' => $nomor,
                        'sifat' => $sifat,
                        'lampiran' => $lampiran,
                        'hal' => $perihal,
                        'isi' => $isi,
                        'tgl_keluar' => $tgl_keluar,
                        'jabatan_penulis' => $jabatan_penulis,
                        'created_by' => $created_by,
                ];
        
        $model->updateTemplate($data,$id);
        session()->setFlashData('info', 'Berhasil Mengupdate Surat');
        return  redirect()->to('/kerangka');
        }

        public function delete($id)
        {
                try {
                        $model = new Template_model();
                        $model->deleteTemplate($id);
                        session()->setFlashData('error', 'Berhasil Menghapus Data');
                        return redirect()->to('/kerangka');
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                        return redirect()->to('/kerangka');
                }
        
        return redirect()->to('/template');
        }

}