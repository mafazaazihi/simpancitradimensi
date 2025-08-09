<?php

namespace App\Models;

use CodeIgniter\Model;

class ChecklistModel extends Model
{
    protected $table            = 'checklist';
    protected $primaryKey       = 'Checklistid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Checklistid', 'Type_id', 'Name', 'Recomended', 'Partrecom'];

    public function insertBtach($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('checklist');
        $builder->insertBatch($data);
    }
}
