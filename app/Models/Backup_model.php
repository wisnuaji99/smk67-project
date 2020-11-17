<?php namespace App\Models;
use CodeIgniter\Model;
 
class Backup_model extends Model {

    //  menunjukkan bahwa model ini mengambil data pada table roles di database
    protected $table = 'surat_backup';

    public function getBackup($id = false)
    {
        if ($id === false) {
            return $this->db->table($this->table)
            ->select('*,DATE_FORMAT(tgl_simpan, "%W,%M %e %Y") as waktu')
            ->get()->getResultArray();
        } else {
            return $this->getWhere(['id' => $id]);
        }
        
    }
    

    public function saveBackup($data)
    {
       $query = $this->db->table($this->table)->insert($data);
       return $query;
    }

    public function updateBackup($data, $id){
        $query = $this->db->table($this->table)->update($data, ['id'=>$id]);
        //echo $this->db->getLastQuery();exit();
        return $query;
    }

    public function deleteBackup($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        if ( !$query)
        {
                        return $this->db->error();
        } else {
            return $query;
        }
    }


    public function getOutputMonthly($month)
    {
        $query = $this->select("count(*) as jumlah, DATE_FORMAT(tgl_simpan,'%M') AS bulan")
        ->where(" DATE_FORMAT(tgl_simpan,'%Y')",$month )
        ->groupBy("DATE_FORMAT(tgl_simpan,'%Y-%m')");
        return $query->get()->getResultArray();
    }

}