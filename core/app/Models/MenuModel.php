<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'usermenu';
    protected $primaryKey       = 'Menuid';
    protected $useAutoIncrement = true;
    //protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Menuid', 'Menuname', 'Controller', 'Icon'];
}
