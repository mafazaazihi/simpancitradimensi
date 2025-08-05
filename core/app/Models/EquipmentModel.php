<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipmentModel extends Model
{
    protected $table            = 'equipment';
    protected $primaryKey       = 'Equipmentid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Equipmentid', 'Sublocation_id', 'Serialnumber', 'Supplier_id', 'Equipmentname'];

    public function get_profile($sn)
    {
        $db = \Config\Database::connect();
        $sql = 'select*from equipment e inner join sublocation s on Sublocationid=e.Sublocation_id inner join location l on l.Locationid=s.Location_id where e.Serialnumber= ?';
        return $db->query($sql, [$sn])->getRowArray();
    }
    public function get_equip($sn)
    {
        $db = \Config\Database::connect();
        $sql = "select*from equipment e inner join sublocation s on Sublocationid=e.Sublocation_id inner join location l on l.Locationid=s.Location_id where e.Serialnumber like '%$sn%'";
        return $db->query($sql)->getResultArray();
    }
}
