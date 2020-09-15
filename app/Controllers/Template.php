<?php namespace App\Controllers;

use App\Models\Template_model;

class Template extends BaseController
{
	public function index()
	{
        $model = new Template_model();
        $data['user3'] = $model->getTemplate();
        //var_dump($model->getRoles());
        return view('template/index',$data);
        }
        
        public function add()
        {
        return view('template/add');
        }

        public function save()
        {
        $model = new Template_model();
        $data = [
                'nomor' => $this->request->getPost('nomor'),
                'sifat' => $this->request->getPost('sifat'),
                'lampiran' => $this->request->getPost('lampiran'),
                'hal' => $this->request->getPost('hal'),
                'tgl_keluar' => $this->request->getPost('tgl_keluar'),
                'jabatan_penulis' => $this->request->getPost('jabatan_penulis'),
        ];
        $model->saveTemplate($data);
        return redirect()->to('/Template');
        }

        public function edit($id)
        {
        $model = new Template_model();
        $data['template'] = $model->getTemplate($id)->getRow();
        return view('template/edit',$data);
        }

        public function view($id)
        {
        $model = new Template_model();
        $data['template'] = $model->getTemplate($id)->getRow();
        return view('template/view',$data);
        }

        public function update()
        {
        $model = new Template_model();
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
        return  redirect()->to('/template');
        }

        public function delete($id)
        {
                try {
                        $model = new Template_model();
                        $model->deleteTemplate($id);
                } catch (\Throwable $th) {
                        session()->setFlashData('danger', 'Pesan : Tidak bisa dihapus karena  '.$th->getMessage());
                }
        
        return redirect()->to('/template');
        }



}