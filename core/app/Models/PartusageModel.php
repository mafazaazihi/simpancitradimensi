<?php

namespace App\Models;

use CodeIgniter\Model;

class PartusageModel extends Model
{
    protected $table            = 'partusage';
    protected $primaryKey       = 'Partusageid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Partusageid', 'Task_id', 'Part_id', 'Quantity', 'Currstock', 'Createdtime', 'Status', 'Pickuppart', 'Notes'];

    public function get_usage($id)
    {
        $db = \Config\Database::connect();
        $sql = "select sum(pu.Quantity) as Qty,pu.Part_id,ps.Partname from partusage pu inner join partstock ps on pu.Part_id=ps.Partid where pu.Task_id=$id and pu.Status !=-1 group by pu.Part_id,ps.Partname ";
        return $db->query($sql)->getResultArray();
    }
}
