<?php

namespace App\Models;

use CodeIgniter\Model;

class CmdetailModel extends Model
{
    protected $table            = 'cmdetail';
    protected $primaryKey       = 'Cmdetailid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Cmdetailid', 'Task_id', 'Action', 'Solution', 'Rootcause'];
}
