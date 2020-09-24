<?php namespace App\Controllers;

use App\Models\Masuk_model;

class Masuk extends BaseController
{

        public function __construct()
        {
                helper('form');
                helper('file');
        }

	public function index()
	{
        $model = new Masuk_model();
        $data['user3'] = $model->getMasuk();
        //var_dump($model->getRoles());
        return view('masuk/index',$data);
        }
        
        public function add()
        {
        return view('masuk/add');
        }

        public function save()
        {
        $model = new Masuk_model();
        $file = $this->request->getFile('file');
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
        return redirect()->to('/Masuk');
        }

        public function edit($id)
        {
        $model = new Masuk_model();
        $data['masuk'] = $model->getMasuk($id)->getRow();
        return view('masuk/edit',$data);
        }

        public function view($id)
        {
        $model = new Masuk_model();
        $data['masuk'] = $model->getMasuk($id)->getRow();
        return view('masuk/view',$data);
        }

        public function update()
        {
        $model = new Masuk_model();
        $id = $this->request->getPost('id');
        $file = $this->request->getFile('file');
        $cek = $model->where('id',$id)->first();
        if ($file !== NULL) {
                unlink(ROOTPATH.'public/uploads/'.$cek["file"]);
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
                try {
                        $model = new Masuk_model();
                        $model->deleteMasuk($id);
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/masuk');
        }

}