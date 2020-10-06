<?php namespace app\models;
use codeigniter\model;

class Surat_user_model extends model {

    protected $table = 'surat_user';
    public function getSuratUser($id=false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
        
    }
    public function saveMasukUser($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }
    public function updateMasukUser($data, $id, $tgl){
        $query = $this->db->table($this->table)->update($data, ['surat_id'=>$id , 'tgl_kirim' =>$tgl]);
        //echo $this->db->getLastQuery();exit();
        return $query;
    }
    public function deleteMasukUser($id)
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