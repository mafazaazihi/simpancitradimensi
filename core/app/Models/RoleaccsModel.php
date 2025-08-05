<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleaccsModel extends Model
{
    protected $table            = 'useraccessmenu';
    protected $primaryKey       = 'Uacmid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Uacmid', 'Role_id', 'Menu_id'];
}
