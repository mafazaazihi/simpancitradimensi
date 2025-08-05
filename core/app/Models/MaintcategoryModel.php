<?php

namespace App\Models;

use CodeIgniter\Model;

class MaintcategoryModel extends Model
{
    protected $table            = 'maintcategory';
    protected $primaryKey       = 'Maintcategoryid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Maintcategoryid', 'Categoryname'];
}
