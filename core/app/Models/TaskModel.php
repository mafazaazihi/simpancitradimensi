<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'task';
    protected $primaryKey       = 'Taskid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Taskid', 'Periode_id', 'Supervisor', 'Location_id', 'Sublocation_id', 'Approval1', 'ApprovalDate1', 'Approval2', 'ApprovalDate2', 'Equipment_id', 'Type_id', 'TaskType', 'NStart', 'NEnd', 'Priority', 'Status', 'Created', 'AssignTo', 'Duedate', 'Duration', 'Shift', 'Notes', 'Completed'];

    public function get_work_open($role = null)
    {
        $db = \Config\Database::connect();
        if ($role == 'Supervisor') {
            $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=1';
        } elseif ($role == 'Manager') {
            $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=2';
        } else {
            $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=0';
        }
        return $db->query($sql)->getResultArray();
    }
    public function get_work_openbl($role = null)
    {
        $curr = curr_date();
        $db = \Config\Database::connect();
        if ($role == 'Supervisor') {
            $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=1';
        } elseif ($role == 'Manager') {
            $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=2';
        } else {
            $sql = "select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=0 and t.Duedate < '$curr'";
        }
        return $db->query($sql)->getResultArray();
    }

    public function taskcmopen($role = null)
    {
        $db = \Config\Database::connect();
        $uid = session()->get('uid');
        if ($role == 'Supervisor') {
            $sql = "select t.Taskid,e.Equipmentname,t.Notes,t.Created,t.Status from task t inner join equipment e on e.Equipmentid=t.Equipment_id  where t.status in (0,1) and t.TaskType=3 and t.Supervisor='$uid'";
        } elseif ($role == 'Manager') {
            $sql = 'select  t.Taskid,e.Equipmentname,t.Notes,t.Created  from task t inner join equipment e on e.Equipmentid=t.Equipment_id  where t.status=2 and t.TaskType=3';
        } else {
            $sql = "select  t.Taskid,e.Equipmentname,t.Notes,t.Created  from task t inner join equipment e on e.Equipmentid=t.Equipment_id  where t.status=0 and t.TaskType=3 and t.AssignTo='$uid'";
        }
        return $db->query($sql)->getResultArray();
    }
    public function get_work_pending($role = null)
    {
        $uid = session()->get('uid');
        $db = \Config\Database::connect();
        if ($role == 'Supervisor') {
            $sql = "select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id  inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=1 and t.Supervisor='$uid'";
        } elseif ($role == 'Manager') {
            $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id  inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=2';
        } else {
            $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id  inner join
            maintcategory m on m.Maintcategoryid=t.TaskType where t.status=6';
        }
        return $db->query($sql)->getResultArray();
    }
    public function get_taskbyid($id)
    {
        $db = \Config\Database::connect();
        $sql = "select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
        maintcategory m on m.Maintcategoryid=t.TaskType where t.Taskid=$id";
        return $db->query($sql)->getRowArray();
    }
    public function get_work_openua($role = null)
    {

        $uid = session()->get('uid');
        $db = \Config\Database::connect();
        $sql = "select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
        maintcategory m on m.Maintcategoryid=t.TaskType where t.status=0 and AssignTo='$uid'";
        return $db->query($sql)->getResultArray();
    }
    public function get_work_closedua()
    {
        $uid = session()->get('uid');
        $db = \Config\Database::connect();
        $sql = "select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
        maintcategory m on m.Maintcategoryid=t.TaskType where t.status!=0 and AssignTo='$uid'";
        return $db->query($sql)->getResultArray();
    }
    public function get_work_closed()
    {
        $db = \Config\Database::connect();
        $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
        maintcategory m on m.Maintcategoryid=t.TaskType where t.status=3';
        return $db->query($sql)->getResultArray();
    }
    public function get_work_inrpo()
    {
        $db = \Config\Database::connect();
        $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
        maintcategory m on m.Maintcategoryid=t.TaskType where t.AssignTo is not null and t.Status=0';
        return $db->query($sql)->getResultArray();
    }
    public function get_work_pend()
    {
        $db = \Config\Database::connect();
        $sql = 'select*from task t inner join equipment e on e.Equipmentid=t.Equipment_id inner join periodpm p on p.Periodid=t.Periode_id inner join
        maintcategory m on m.Maintcategoryid=t.TaskType where t.Status =1 or t.Status=2';
        return $db->query($sql)->getResultArray();
    }
}
