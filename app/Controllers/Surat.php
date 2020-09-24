<?php namespace App\Controllers;

use App\models\Surat_model;

class Surat extends BaseController
{
    public function __construct(){
    helper('form');
    helper('file');   
    }
    
    public function index(){
            $model = new Surat_model();
            $data['user3'] = $model->getMasuk();
            return view('surat/index',$data);
    }

    public function add(){
            return view('surat/add');
    }

    public function save(){
        $model= new Surat_model();
        $file= $this->request->getFile('file');
        if ($file !== NULL){
            $file->move(ROOTPATH.'public/uploads');
            $getFile = $file->getName();
        } else{
            $getFile = NULL;
        }

        $data =[
            'judul' => $this->request->getPost('judul'),
            'file' => $getFile,
            'status' => $this->request->getPost('status'),
        ];

        $model->saveSurat($data);
        return redirect()->to ('/Surat');
    }

        public function edit($id){
        $model = new Surat_model();
        $data['surat'] = $model->getMasuk($id)->getRow();
        return view('surat/edit',$data);
    }

        public function view($id){
        $model = new Surat_model();
        $data['surat'] = $model->getSurat($id)->getRow();
        return view('surat/view',$data);
    }

        public function update(){
            $model = new Surat_model();
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
            
            $model->updateSurat($data,$id);
            return  redirect()->to('/surat');
    }

            public function delete($id){
                try {
                        $model = new Surat_model();
                        $model->deleteSurat($id);
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/surat');
    }

    

}