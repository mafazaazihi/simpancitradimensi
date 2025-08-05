<?php

namespace App\Models;

use CodeIgniter\Model;

class SublocationModel extends Model
{
    protected $table            = 'sublocation';
    protected $primaryKey       = 'Sublocationid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Sublocationid', 'Location_id', 'Namesublocation'];
}
