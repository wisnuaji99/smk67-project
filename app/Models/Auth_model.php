<?php namespace App\Models;
use CodeIgniter\Model;
 
class Auth_model extends Model {

    //  menunjukkan bahwa model ini mengambil data pada table roles di database
    protected $table = 'users';

    public function getUsers($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
        
    }
    public function register($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }

    public function cek_login($nik)
    {
        $query = $this->db->table($this->table)->where('nik',$nik)->countAll();
        if ($query > 0) {
            $hasil = $this->db->table($this->table)->where('nik',$nik)->limit(1)->get()->getRowArray();
        } else {
            $hasil = array();
        }
        
       return $hasil;
    }
    public function updateUsers($data, $id){
        $query = $this->db->table($this->table)->update($data, ['id'=>$id]);
        //echo $this->db->getLastQuery();exit();
        return $query;
    }
    public function deleteUsers($id)
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