<?php namespace App\Models;
use CodeIgniter\Model;
 
class User_model extends Model {

    //  menunjukkan bahwa model ini mengambil data pada table roles di database
    protected $table = 'users';

    public function getUsers($id = false)
    {
        if ($id === false) {
            return $this->db->table($this->table." a ")
            ->select(' a.* , b.name_role AS roles')
            ->join('user_roles c','a.id=c.user_id','left')
            ->join('roles b','c.role_id=b.id','left')
            ->groupBy(["a.id",])
            ->get()->getResultArray();
        } else {
            return $this->db->table($this->table." a " )
            ->select('a.*, b.name_role AS roles, b.id as role_id')
            ->join('user_roles c','a.id=c.user_id','left')->join('roles b','c.role_id=b.id','left')
            ->groupBy(["a.id",])->getWhere(['a.id' => $id]);
            
        }
        
    }
    public function saveUser($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }
    public function updateUser($data, $id){
        $query = $this->db->table($this->table)->update($data, ['id'=>$id]);
        //echo $this->db->getLastQuery();exit();
        return $query;


    }
    
    public function deleteUser($id)
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