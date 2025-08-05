<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\RESTful\ResourceController;

class Restfull extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->task = new TaskModel();
    }

    public function getpmcalendar()
    {
        $data = $this->task->get_work_open();
        $result = array();
        foreach ($data as $d) {
            $result = [
                'id' => $d['Taskid'],
                'title' => $d['Categoryname'] . ': ' . $d['Equipmentname'] . ': ' . $d['Periodname'],
                'start' => $d['Duedate']
            ];
        }

        return $this->respond($result, 200);
    }
}
