<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodpmModel extends Model
{
    protected $table            = 'periodpm';
    protected $primaryKey       = 'Periodid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Periodid', 'Periodname', 'Days'];
}
