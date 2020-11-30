<?php namespace App\Models;
use CodeIgniter\Model;
 
class Template_model extends Model {

    //  menunjukkan bahwa model ini mengambil data pada table roles di database
    protected $table = 'template';

    public function getTemplate($id = false)
    {
        if ($id === false) {
            return $this->db->table($this->table." a ")
            ->select(' a.* , b.name AS name')
            ->join('users b','a.user_id=b.id','left')
            ->groupBy(["a.id"])
            ->orderBy('a.tgl_keluar','desc')
            ->get()->getResultArray();
        } else {
            return $this->db->table($this->table." a " )
            ->select(' a.* , b.name AS name')
            ->join('users b','a.user_id=b.id','left')
            ->groupBy(["a.id"])
            ->orderBy('a.tgl_keluar','desc')
            ->getWhere(['a.id' => $id]);
            
        }
        
    }
    public function saveTemplate($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }

    public function updateTemplate($data, $id){
        $query = $this->db->table($this->table)->update($data, ['id'=>$id]);
        //echo $this->db->getLastQuery();exit();
        return $query;


    }
    public function deleteTemplate($id)
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