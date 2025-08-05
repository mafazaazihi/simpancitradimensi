<?php

namespace App\Models;

use CodeIgniter\Model;

class PartaddModel extends Model
{
    protected $table            = 'partadd';
    protected $primaryKey       = 'Stockid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Stockid', 'Part_id', 'Quantity', 'Price', 'OpbNumber', 'Supplier_id', 'Adddate', 'Notes', 'Currstock'];
}
