<?php namespace app\models;
use codeigniter\model;

class User_roles_model extends model {

    protected $table = 'user_roles';
    public function getUserRoles($id=false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
        
    }
    public function saveUserRoles($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }
    public function updateUserRoles($data, $id){
        $query = $this->db->table($this->table)->update($data, ['user_id'=>$id]);
        //echo $this->db->getLastQuery();exit();
        return $query;
    }
    public function deleteUserRoles($id)
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