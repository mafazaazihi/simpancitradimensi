<?php

namespace App\Models;

use CodeIgniter\Model;

class TypecheckModel extends Model
{
    protected $table            = 'typecheck';
    protected $primaryKey       = 'Typeid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Typeid', 'Equipment_id', 'Period_id', 'Typename'];

    public function get_typebysnperiod($sn = null, $per = null)
    {
        $db = \Config\Database::connect();
        $sql = 'select*from typecheck where Equipment_id=? and Period_id=?';
        return $db->query($sql, [$sn, $per])->getResultArray();
    }
}
