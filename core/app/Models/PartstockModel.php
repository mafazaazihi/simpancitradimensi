<?php

namespace App\Models;

use CodeIgniter\Model;

class PartstockModel extends Model
{
    protected $table            = 'partstock';
    protected $primaryKey       = 'Partid';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Partid', 'Equipment_id', 'Sapid', 'Image', 'Partname', 'Supplier_id', 'Quantity', 'Address_id', 'Minqty', 'Price', 'Setreminder', 'Lastreminder', 'Isobsolete', 'Lastupdate'];

    public function getpart($pn)
    {
        $db = \Config\Database::connect();
        $sql = "select*from partstock where Partid like '%$pn%'";
        return $db->query($sql)->getRowArray();
    }
}
