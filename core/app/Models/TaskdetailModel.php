<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskdetailModel extends Model
{
    protected $table            = 'taskdetail';
    protected $primaryKey       = 'Detailid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Detailid', 'Partrecom', 'Task_id', 'ChecklistName', 'Actual', 'Recomended'];

    public function insertBtach($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('taskdetail');
        $builder->insertBatch($data);
    }
}
