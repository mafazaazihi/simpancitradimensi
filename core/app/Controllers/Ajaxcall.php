<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChecklistModel;
use App\Models\EquipmentModel;
use App\Models\PartaddModel;
use App\Models\PartstockModel;
use App\Models\PartusageModel;
use App\Models\PeriodpmModel;
use App\Models\RoleaccsModel;
use App\Models\RoleModel;
use App\Models\TaskdetailModel;
use App\Models\TaskModel;
use App\Models\TypecheckModel;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;

class Ajaxcall extends BaseController
{
    public function __construct()
    {
        $this->uaccessmenu = new RoleaccsModel();
        $this->equip = new EquipmentModel();
        $this->period = new PeriodpmModel();
        $this->type = new TypecheckModel();
        $this->task = new TaskModel();
        $this->stock = new PartstockModel();
        $this->taskd = new TaskdetailModel();
        $this->usage = new PartusageModel();
        $this->add = new PartaddModel();
        $this->role = new RoleModel();
    }
    public function index()
    {
        //
    }

    public function getpartdetail()
    {
        if ($this->request->getPost('req')) {

            $reqid = $this->request->getPost('req');
            $usge = $this->usage->find($reqid);
            $id = $usge['Part_id'];
            $data = $this->stock->find($id);
            $prof = profile($usge['Pickuppart']);
            $dump = [
                'Partid' => $data['Partid'],
                'Partname' => $data['Partname'],
                'Quantity' => $usge['Quantity'],
                'Pickuppart' => $prof['Fullname'],
                'Addr' => $data['Address_id'],
                'Currq' => $data['Quantity']
            ];
            echo json_encode($dump);
        } else {
            $id = $this->request->getPost('partid');
            $data = $this->stock->find($id);
            echo json_encode($data);
        }
    }

    public function changetskduedate()
    {

        $data = [
            'Taskid' => $this->request->getPost('taskid'),
            'Duedate' => $this->request->getPost('due')
        ];

        $this->task->save($data);
    }

    public function pmcalendar()
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

        echo json_encode($result);
    }

    public function approvewo()
    {
        $id = session()->get('roleid');
        $role = $this->role->find($id);
        if ($role['Rolename'] == 'Supervisor') {
            $data = [
                'Taskid' => $this->request->getPost('taskid'),
                'Status' => 2,
                'Approval1' => session()->get('uid'),
                'ApprovalDate1' => curr_date()
            ];
        } elseif ($role['Rolename'] == 'Manager') {
            $data = [
                'Taskid' => $this->request->getPost('taskid'),
                'Status' => 3,
                'Approval2' => session()->get('uid'),
                'ApprovalDate2' => curr_date()
            ];
        }

        $this->task->save($data);
    }

    public function rejectpart()
    {
        if ($this->request->getPost('approve')) {
            $req = [
                'Partusageid' => $this->request->getPost('approve'),
                'Status' => 2
            ];
            $this->usage->save($req);
            audit_log('Approved request with ID: ' . $this->request->getPost('approve'));
            success_message('Approved');
        } else {

            $req = [
                'Partusageid' => $this->request->getPost('reqidx'),
                'Status' => -1
            ];
            $part = [
                'Partid' => $this->request->getPost('partid'),
                'Quantity' => $this->request->getPost('cuurq')
            ];
            $add = [
                'Part_id' => $this->request->getPost('partid'),
                'Notes' => 'Returned',
                'Quantity' => $this->request->getPost('qty'),
                'Adddate' => curr_date(),
                'Currstock' => $this->request->getPost('cuurq')
            ];
            $this->usage->save($req);
            $this->add->save($add);
            $this->stock->save($part);
            audit_log(json_encode($req) . 'Rejected');
        }
    }

    public function obsolete()
    {
        $id = $this->request->getPost('partid');
        $part = $this->stock->find($id);
        if ($part['Isobsolete'] == 0) {
            $data = [
                'Partid' => $id,
                'Isobsolete' => 1
            ];
        } else {
            $data = [
                'Partid' => $id,
                'Isobsolete' => 0
            ];
        }

        $this->stock->save($data);
    }

    public function changeaccs()
    {
        if (!$this->request->getPost('used')) {
            $data = [
                'Role_id' => $this->request->getPost('roleid'),
                'Menu_id' => $this->request->getPost('menuid')
            ];

            $this->uaccessmenu->save($data);
            session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">Access changed<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            $id = $this->request->getPost('used');
            $this->uaccessmenu->delete($id);
            session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">Access changed<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
    }

    public function machine()
    {
        $sn = $this->request->getPost('query');
        $data = $this->equip->get_equip($sn);
        $array = array();
        foreach ($data as $d) {
            $array[] = $d['Serialnumber'];
        }


        echo json_encode($array);
    }

    public function getpartlike()
    {
        $pn = $this->request->getPost('pn');
        $data = $this->stock->getpart($pn);

        $array = array();
        if ($data) {
            $array[] = $data['Partid'];
        } else {
            $array = '';
        }
        echo json_encode($array);
    }

    public function getmachinesn()
    {
        $sn = $this->request->getPost('serial');
        $data = $this->equip->get_profile($sn);
        echo json_encode($data);
    }

    public function getchecklist()
    {
        $sn = $this->request->getPost('serial');
        $pr = $this->request->getPost('period');

        $mach = $this->equip->get_profile($sn);
        $type = $this->type->get_typebysnperiod($mach['Equipmentid'], $pr);
        echo json_encode($type, true);
    }

    public function gettaskdetail()
    {
        $id = $this->request->getPost('task');
        $data = $this->task->get_taskbyid($id);
        echo json_encode($data);
    }

    public function getpart()
    {
        $part = $this->request->getPost('partx');
        $data = $this->stock->getpart($part);
        echo json_encode($data);
    }

    public function updatetim()
    {
        $start = $this->request->getPost('start');
        $task = $this->request->getPost('taskid');
        $end = $this->request->getPost('end');
        $dst = date_create($start);
        $dse = date_create($end);
        $comment = $this->request->getPost('comment');

        if ($start) {
            $data = [
                'Taskid' => $task,
                'NStart' => date_format($dst, 'Y-m-d H:i:s')
            ];
            $this->task->save($data);
            echo json_encode($data);
        } elseif ($comment) {
            $taskx = $this->task->find($task);
            $period = $this->period->find($taskx['Periode_id']);
            $newtask = [
                'Location_id' => $taskx['Location_id'],
                'Sublocation_id' => $taskx['Sublocation_id'],
                'Equipment_id' => $taskx['Equipment_id'],
                'Periode_id' => $taskx['Periode_id'],
                'Type_id' => $taskx['Type_id'],
                'Status' => $taskx['Status'],
                'Created' => curr_date(),
                'Duedate' => future_date($taskx['Duedate'], $period['Days']),
                'Priority' => $taskx['Priority'],
                'TaskType' => $taskx['TaskType']
            ];
            $data = [
                'Taskid' => $task,
                'Notes' => $comment,
                'Status' => 1
            ];
            $this->task->save($data);
            $this->new_task($newtask);
        } else {
            $data = [
                'Taskid' => $task,
                'NEnd' => date_format($dse, 'Y-m-d H:i:s')
            ];
            $this->task->save($data);
        }
    }
    public function entry()
    {
        $tableData = json_decode(file_get_contents('php://input'), true);
        $row = array();
        $columns = array();
        for ($x = 1; $x < count($tableData); $x++) {
            $row = array(
                'Task_id' => $tableData[$x]['Taskid'],
                'ChecklistName' => $tableData[$x]['Checklist Item'],
                'Actual' =>  $tableData[$x]['Actual'],
                'Recomended' => $tableData[$x]['Recomended']
            );
            array_push($columns, $row);
        }
        $this->taskd->insertBtach($columns);
    }

    function new_task($data)
    {
        $this->task->save($data);
    }
}
