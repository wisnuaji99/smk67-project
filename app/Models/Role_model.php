<?php namespace App\Models;
use CodeIgniter\Model;
 
class Role_model extends Model {

    //  menunjukkan bahwa model ini mengambil data pada table roles di database
    protected $table = 'roles';

    public function getRoles($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
        
    }

    public function saveRoles($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }

    public function updateRoles($data, $id){
        $query = $this->db->table($this->table)->update($data, ['id'=>$id]);
        return $query;
    }

    public function deleteRoles($id)
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