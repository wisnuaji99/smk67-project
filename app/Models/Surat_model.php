<?php namespace app\models;
use codeigniter\model;

class Surat_model extends model {

    protected $table = 'surat_user';
    public function getSurat($id = false)
    {
        if ($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id]);
        }


    }
    
    public function saveSurat($data)
    {
    $query = $this->db->table($this->table)->insert($data);
    return $query;
    }
    
    public function updateSurat($data,$id)
    {
    $query = $this->db->table($this->table)->update($data, ['id' => $id]);
    return $query;
    }

    public function deleteSurat($id)
    {
    $query = $this->db->table($this->table)->delete(array('id'=> $id));
    if (!$query)
    {
        return $this->db->error();
    }else{
    return $query;
    }
}

}