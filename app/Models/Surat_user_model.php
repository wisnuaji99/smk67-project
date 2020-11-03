<?php namespace app\models;
use CodeIgniter\model;

class Surat_user_model extends model {

    protected $table = 'surat_user';
    public function getSuratUser($id=false)
    {
        if ($id === false) {
            return $this->db->table($this->table." a ")
            ->select('a.*, DATE_FORMAT(a.tgl_kirim, "%W,%M %e %Y") as waktu ,b.judul AS judul_surat,b.nomor AS nomor_surat, b.file AS file_surat, c.name AS nama_penerima')
            ->join('surat_masuk b','a.surat_id=b.id','left')
            ->join('users c','a.user_id = c.id','left')
            ->get()->getResultArray();

        } else {
            return $this->db->table($this->table." a " )
            ->select('a.*, DATE_FORMAT(a.tgl_kirim, "%W,%M %e %Y") as waktu, b.judul AS judul_surat,b.nomor AS nomor_surat, b.file AS file_surat, c.name AS nama_penerima')
            ->join('surat_masuk b','a.surat_id=b.id','left')
            ->join('users c','a.user_id = c.id','left')
            ->getWhere(['a.id' => $id]);            
        }
        
    }

    public function getSuratUserGuru($id=false)
    {
        return $this->db->table($this->table." a " )
            ->select('a.*, DATE_FORMAT(a.tgl_kirim, "%W,%M %e %Y") as waktu, b.judul AS judul_surat,b.nomor AS nomor_surat, b.file AS file_surat, c.name AS nama_penerima')
            ->join('surat_masuk b','a.surat_id=b.id','left')
            ->join('users c','a.user_id = c.id','left')
            ->getWhere(['a.user_id' => $id])->getResultArray();
    }

    public function getRequestData($id=false)
    {
        if ($id === false) {

            return $this->db->table($this->table." a " )
            ->select('a.*, DATE_FORMAT(a.tgl_kirim, "%W,%M %e %Y") as waktu, b.judul AS judul_surat,b.nomor AS nomor_surat, b.file AS file_surat, c.name AS nama_penerima')
            ->join('surat_masuk b','a.surat_id=b.id','left')
            ->join('users c','a.user_id = c.id','left')
            ->getWhere(['a.status' => 3])->getResultArray();

        } else {
            return $this->db->table($this->table." a " )
            ->select('a.*, DATE_FORMAT(a.tgl_kirim, "%W,%M %e %Y") as waktu, b.judul AS judul_surat,b.nomor AS nomor_surat, b.file AS file_surat, c.name AS nama_penerima')
            ->join('surat_masuk b','a.surat_id=b.id','left')
            ->join('users c','a.user_id = c.id','left')
            ->getWhere(['a.user_id' => $id, 'a.status' => 3])->getResultArray();
        }
        
        
    }

    public function saveMasukUser($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }

    public function updateSurat($data, $id){
        $query = $this->db->table($this->table)->update($data, ['id'=>$id]);
        //echo $this->db->getLastQuery();exit();
        return $query;
    }

    public function deleteSurat($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        if ( !$query)
        {
                        return $this->db->error();
        } else {
            return $query;
        }
    }
    



}