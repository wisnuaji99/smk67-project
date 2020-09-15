<?php namespace App\Models;
use CodeIgniter\Model;
 
class Masuk_model extends Model {

    //  menunjukkan bahwa model ini mengambil data pada table roles di database
    protected $table = 'surat_masuk';

    public function getMasuk($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
        
    }
    public function saveMasuk($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }
    public function updateMasuk($data, $id){
        $query = $this->db->table($this->table)->update($data, ['id'=>$id]);
        //echo $this->db->getLastQuery();exit();
        return $query;
    }
    public function deleteMasuk($id)
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