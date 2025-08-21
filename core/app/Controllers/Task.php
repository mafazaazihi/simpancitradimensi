<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipmentModel;
use App\Models\TaskModel;
use App\Models\LocationModel;
use App\Models\MaintcategoryModel;
use App\Models\PartstockModel;
use App\Models\PeriodpmModel;
use App\Models\SublocationModel;
use App\Models\SupplierModel;
use App\Models\ChecklistModel;
use App\Models\CmdetailModel;
use App\Models\PartusageModel;
use App\Models\RoleModel;
use App\Models\TypecheckModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Task extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->equipment = new EquipmentModel();
        $this->location = new LocationModel();
        $this->sublocation = new SublocationModel();
        $this->part = new PartstockModel();
        $this->supplier = new SupplierModel();
        $this->task = new TaskModel();
        $this->period = new PeriodpmModel();
        $this->type = new TypecheckModel();
        $this->check = new ChecklistModel();
        $this->category = new MaintcategoryModel();
        $this->usage = new PartusageModel();
        $this->stock = new PartstockModel();
        $this->cmdetail = new CmdetailModel();
        $this->role = new RoleModel();
    }
    public function index($id = null)
    {
        if ($id) {
            $data['title'] = 'Work orders# ' . $id;
            $data['prof'] = profile();
            $data['id'] = $id;
            $data['usage'] = $this->usage->get_usage($id);
            $task = $this->task->find($id);
            $data['task'] = $task;
            $data['check'] = $this->check->where('Type_id', $task['Type_id'])->findAll();
            if ($task['TaskType'] == 3) {
                return render_templatex('task/taskcm', $data);
            } else {
                return render_templatex('task/pmreport', $data);
            }
        } elseif ($this->request->getPost('getpn')) {
            $data = [
                'Partid' => $this->request->getPost('getpn'),
                'Quantity' => $this->request->getPost('stockaf')
            ];
            $datax = [
                'Part_id' => $this->request->getPost('getpn'),
                'Task_id' => $this->request->getPost('taskid'),
                'Quantity' => $this->request->getPost('qty'),
                'Currstock' => $this->request->getPost('stockaf'),
                'Status' => 1,
                'Createdtime' => curr_date(),
                'Notes' => 'Pickup',
                'Pickuppart' => session()->get('uid')
            ];
            $this->part->save($data);
            $this->usage->save($datax);
            success_message('Part added');
            return redirect_to('task/' . $this->request->getPost('taskid'));
        } else {

            $data['title'] = 'Work orders';
            $data['prof'] = profile();
            $role = $this->role->find(session()->get('roleid'));
            $data['tasko'] = $this->task->get_work_openua();
            $data['taskcm'] = $this->task->taskcmopen($role['Rolename']);
            $data['taskc'] = $this->task->get_work_closedua();
            $data['cat'] = $this->category->findAll();
            $data['eng'] = $this->user->where('Role_id', 2)->findAll();
            return render_templatex('task/index', $data);
        }
    }

    public function catalog()
    {
        $data['title'] = 'Part Catalogs';
        $data['prof'] = profile();
        $data['catalog'] = $this->stock->findAll();

        return render_templatex('task/catalog', $data);
    }

    public function workordercm()
    {
        if ($this->request->getPost('solution')) {
            $cmdata = [
                'Task_id' => $this->request->getPost('cmtaskid'),
                'Action' => $this->request->getPost('action'),
                'Solution' => $this->request->getPost('solution'),
                'Rootcause' => $this->request->getPost('rootcause'),
            ];
            $task = [
                'Taskid' => $this->request->getPost('cmtaskid'),
                'Status' => 1
            ];
            $this->cmdetail->save($cmdata);
            $this->task->save($task);
            success_message('Your report submitted');
            return redirect_to('task');
        } else {
            $sn = $this->request->getPost('equip');
            $profile = $this->equipment->get_profile($sn);
            $data = [
                'Location_id' => $profile['Location_id'],
                'Sublocation_id' => $profile['Sublocationid'],
                'Equipment_id' => $profile['Equipmentid'],
                'Status' => 0,
                'Created' => curr_date(),
                'Notes' => $this->request->getPost('problem'),
                'Priority' => $this->request->getPost('priority'),
                'TaskType' => 3,
                'AssignTo' => $this->request->getPost('eng'),
                'Supervisor' => session()->get('uid')
            ];

            $this->task->save($data);
            success_message('New CM task added');
            return redirect_to('task');
        }
    }

    public function report()
    {
        $data['title'] = 'Reports';
        $data['prof'] = profile();
        return render_templatex('task/report', $data);
    }
}
