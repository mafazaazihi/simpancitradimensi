<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmenuModel extends Model
{
    protected $table            = 'submenu';
    protected $primaryKey       = 'Submenuid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Submenuid', 'Menu_id', 'Tittle', 'Url', 'Active'];

    public function getsubmenu()
    {
        $db = \Config\Database::connect();
        $sql = 'select * from submenu su inner join usermenu um on su.Menu_id=um.Menuid';
        return $db->query($sql)->getResultArray();
    }
}
