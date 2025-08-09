<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddressModel;
use App\Models\ChecklistModel;
use App\Models\CmdetailModel;
use App\Models\EquipmentModel;
use App\Models\LocationModel;
use App\Models\MaintcategoryModel;
use App\Models\PartaddModel;
use App\Models\PartstockModel;
use App\Models\PartusageModel;
use App\Models\PeriodpmModel;
use App\Models\RoleModel;
use App\Models\SublocationModel;
use App\Models\SupplierModel;
use App\Models\TaskdetailModel;
use App\Models\TaskModel;
use App\Models\TypecheckModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Management extends BaseController
{
    public function __construct()
    {
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
        $this->user = new UserModel();
        $this->usage = new PartusageModel();
        $this->partaddr = new AddressModel();
        $this->add = new PartaddModel();
        $this->role = new RoleModel();
        $this->tdetail = new TaskdetailModel();
        $this->cmdetail = new CmdetailModel();
    }
    public function index() {}
    public function calendar($id = null)
    {
        if ($id == 'lsw') {
            $lsw = date('W', strtotime(curr_date())) - 1;
            $year = date('Y', strtotime(curr_date()));
            $data['scho'] = $this->task->where(['Status !=' => 3, 'WEEK(Duedate)' => $lsw, 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
            $data['backlog'] = $this->task->where(['Status ' => 0, 'WEEK(Duedate)' => $lsw, 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
            $data['close'] = $this->task->where(['Status ' => 3, 'WEEK(Duedate)' => $lsw, 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
        } elseif ($id == 'tsw') {
            $tsw = date('W', strtotime(curr_date()));
            $year = date('Y', strtotime(curr_date()));
            $data['scho'] = $this->task->where(['Status !=' => 3, 'WEEK(Duedate)' => $tsw, 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
            $data['backlog'] = $this->task->where(['Status ' => 0, 'WEEK(Duedate)' => $tsw, 'Duedate <' => date('Y-m-d'), 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
            $data['close'] = $this->task->where(['Status ' => 3, 'WEEK(Duedate)' => $tsw, 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
        } elseif ($id == 'tsm') {
            $tsm = date('m', strtotime(curr_date()));
            $year = date('Y', strtotime(curr_date()));
            $data['scho'] = $this->task->where(['Status !=' => 3, 'MONTH(Duedate)' => $tsm, 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
            $data['backlog'] = $this->task->where(['Status ' => 0, 'MONTH(Duedate)' => $tsm, 'Duedate <' => date('Y-m-d'), 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
            $data['close'] = $this->task->where(['Status ' => 3, 'MONTH(Duedate)' => $tsm, 'YEAR(Duedate)' => $year, 'TaskType' => 2])->findAll();
        } else {
            $date = date('Y-m-d');
            $data['scho'] = $this->task->where(['Status !=' => 3, 'TaskType' => 2])->findAll();
            $data['backlog'] = $this->task->where(['Status ' => 0, 'Duedate <' => $date, 'TaskType' => 2])->findAll();
            $data['close'] = $this->task->get_work_closed();
        }
        $data['pend'] = $this->task->get_work_pend();
        $data['sch'] = $this->task->get_work_open();
        $data['inpro'] = $this->task->get_work_inrpo();
        $data['title'] = 'Maintenanace Calendar';
        $data['prof'] = profile();
        return render_templatex('management/index', $data);
    }
    public function equipment()
    {
        if ($this->request->getPost('locname')) {
            $data = [
                'Name' => $this->request->getPost('locname')
            ];
            $this->location->save($data);
            success_message('New location added');
            return redirect_to('managements/equipment');
        } elseif ($this->request->getPost('equipmetdidx')) {
            $id = $this->request->getPost('equipmetdidx');
            $data = $this->equipment->find($id);
            echo json_encode($data);
        } elseif ($this->request->getPost('machine')) {
            $data = [
                'Sublocation_id' => $this->request->getPost('ssubloc'),
                'Supplier_id' => $this->request->getPost('ssupl'),
                'Serialnumber' => $this->request->getPost('serial'),
                'Equipmentname' => $this->request->getPost('machine')
            ];
            $this->equipment->save($data);
            success_message('New equipment added');
            return redirect_to('managements/equipment');
        } elseif ($this->request->getPost('emachine')) {
            $data = [
                'Equipmentid' => $this->request->getPost('eequipmentid'),
                'Sublocation_id' => $this->request->getPost('essubloc'),
                'Supplier_id' => $this->request->getPost('essupl'),
                'Serialnumber' => $this->request->getPost('eserial'),
                'Equipmentname' => $this->request->getPost('emachine')
            ];
            $this->equipment->save($data);
            success_message('Equipment updated');
            return redirect_to('managements/equipment');
        } elseif ($this->request->getPost('subloc')) {
            $data = [
                'Location_id' => $this->request->getPost('slocname'),
                'Namesublocation' => $this->request->getPost('subloc')
            ];
            $this->sublocation->save($data);
            success_message('New sub location added');
            return redirect_to('managements/equipment');
        } else {
            $data['title'] = 'Equipment';
            $data['prof'] = profile();
            $data['equip'] = $this->equipment->findAll();
            $data['subloc'] = $this->sublocation->findAll();
            $data['loc'] = $this->location->findAll();
            $data['sup'] = $this->supplier->findAll();
            return render_templatex('management/equipment', $data);
        }
    }

    public function supplier()
    {
        if ($this->request->getPost('supname')) {
            $data = [
                'Namesupplier' => $this->request->getPost('supname'),
                'Address' => $this->request->getPost('addr'),
                'Telepone' => $this->request->getPost('phone'),
                'Pic' => $this->request->getPost('pic'),
                'Fax' => $this->request->getPost('fax'),
                'Mail' => $this->request->getPost('email')
            ];
            $this->supplier->save($data);
            success_message('Supplier added');
            return redirect_to('managements/supplier');
        } elseif ($this->request->getPost('esupname')) {
            $data = [
                'Supplierid' => $this->request->getPost('esupid'),
                'Namesupplier' => $this->request->getPost('esupname'),
                'Address' => $this->request->getPost('eaddr'),
                'Telepone' => $this->request->getPost('ephone'),
                'Pic' => $this->request->getPost('epic'),
                'Fax' => $this->request->getPost('efax'),
                'Mail' => $this->request->getPost('eemail')
            ];
            $this->supplier->save($data);
            success_message('Supplier updated');
            return redirect_to('managements/supplier');
        } elseif ($this->request->getPost('supplieridx')) {
            $id = $this->request->getPost('supplieridx');
            $sup = $this->supplier->find($id);
            echo json_encode($sup);
        } else {
            $data['title'] = 'Equipment';
            $data['prof'] = profile();
            $data['sup'] = $this->supplier->findAll();
            return render_templatex('management/supplier', $data);
        }
    }

    public function checklist($id = null)
    {
        if ($this->request->getPost('checklist')) {
            $data = [
                'Equipment_id' => $this->request->getPost('equip'),
                'Period_id' => $this->request->getPost('period'),
                'Typename' => $this->request->getPost('checklist')
            ];

            $this->type->save($data);
            success_message('New checklist added');
            return redirect_to('managements/checklist');
        } elseif ($this->request->getPost('echecklist')) {
            $data = [
                'Typeid' => $this->request->getPost('typeid'),
                'Equipment_id' => $this->request->getPost('eequip'),
                'Period_id' => $this->request->getPost('eperiod'),
                'Typename' => $this->request->getPost('echecklist')
            ];

            $this->type->save($data);
            success_message('Checklist updated');
            return redirect_to('managements/checklist');
        } elseif ($this->request->getPost('periodname')) {
            $data = [
                'Periodname' => $this->request->getPost('periodname'),
                'Days' => $this->request->getPost('days')
            ];
            $this->period->save($data);
            success_message('New period added');
            return redirect_to('managements/checklist');
        } elseif ($this->request->getPost('eperiodname')) {
            $data = [
                'Periodid' => $this->request->getPost('eperiodid'),
                'Periodname' => $this->request->getPost('eperiodname'),
                'Days' => $this->request->getPost('edays')
            ];
            $this->period->save($data);
            success_message('Period updated');
            return redirect_to('managements/checklist');
        } elseif ($this->request->getPost('checkidx')) {
            $id = $this->request->getPost('checkidx');
            $data = $this->type->find($id);
            echo json_encode($data);
        } elseif ($id) {
            $typ = $this->type->find($id);
            $equip = $this->equipment->find($typ['Equipment_id']);
            $data['title'] = 'Checklist items: ' . $typ['Typename'] . ' (' . $equip['Equipmentname'] . ')';
            $data['prof'] = profile();
            $data['typ'] = $typ;
            $data['check'] = $this->check->where('Type_id', $typ['Typeid'])->findAll();
            return render_templatex('management/checklistitem', $data);
        } else {
            $data['title'] = 'Checklist items';
            $data['prof'] = profile();
            $data['typ'] = $this->type->findAll();
            $data['period'] = $this->period->findAll();
            $data['equip'] = $this->equipment->findAll();
            return render_templatex('management/checklist', $data);
        }
    }

    public function addchecklist()
    {
        if ($this->request->getPost('erecomended')) {
            $typ = $this->request->getPost('etypeid');
            $data = [
                'Checklistid' => $this->request->getPost('checkid'),
                'Name' => $this->request->getPost('echeck'),
                'Recomended' => $this->request->getPost('erecomended'),
                'Partrecom' => $this->request->getPost('epartrecom'),
            ];

            $this->check->save($data);
            success_message('Item updated');
            return redirect_to('managements/checklist/' . $typ);
        } else {

            $type = $this->request->getPost('typeid');
            $ck = $this->request->getPost('check');
            $data = array();
            foreach ($ck as $key => $val) {
                $data[] = array(
                    'Type_id' => $type,
                    'Name' => $_POST['check'][$key],
                    'Recomended' => $_POST['recomended'][$key],
                    'Partrecom' => $_POST['part'][$key]
                );
            }
            $this->check->insertBtach($data);
            success_message('New items added');
            return redirect_to('managements/checklist/' . $type);
        }
    }

    public function workorder()
    {
        if ($this->request->getPost('equip')) {
            $sn = $this->request->getPost('equip');
            $profile = $this->equipment->get_profile($sn);
            if ($profile) {
                $data = [
                    'Location_id' => $profile['Location_id'],
                    'Sublocation_id' => $profile['Sublocationid'],
                    'Equipment_id' => $profile['Equipmentid'],
                    'Periode_id' => $this->request->getPost('period'),
                    'Type_id' => $this->request->getPost('checklist'),
                    'Status' => 0,
                    'Created' => curr_date(),
                    'Duration' => $this->request->getPost('duration'),
                    'Priority' => $this->request->getPost('priority'),
                    'TaskType' => $this->request->getPost('ttype'),
                    'Duedate' => $this->request->getPost('duedate')
                ];
                $this->task->save($data);
                success_message('New work order added');
                return redirect_to('managements/workorder');
            } else {
                fail_message('Equipmet not exist');
                return redirect_to('managements/workorder');
            }
        } elseif ($this->request->getPost('eng')) {
            $data = [
                'Taskid' => $this->request->getPost('etaskid'),
                'AssignTo' => $this->request->getPost('eng')
            ];
            $this->task->save($data);
            success_message('Task assigned to ' . $this->request->getPost('eng'));
            return redirect_to('managements/workorder');
        } else {
            $role = $this->role->find(session()->get('roleid'));
            $data['title'] = 'Work orders';
            $data['prof'] = profile();
            $data['tasko'] = $this->task->get_work_open();
            $data['pending'] = $this->task->get_work_pending($role['Rolename']);
            $data['taskc'] = $this->task->get_work_closed();
            $data['type'] = $this->type->findAll();
            $data['period'] = $this->period->findAll();
            $data['equip'] = $this->equipment->findAll();
            $data['subloc'] = $this->sublocation->findAll();
            $data['loc'] = $this->location->findAll();
            $data['cat'] = $this->category->findAll();
            $data['eng'] = $this->user->where('Role_id', 2)->findAll();
            return render_templatex('management/workorder', $data);
        }
    }

    public function woreport($id)
    {
        $task = $this->task->find($id);
        if ($task['TaskType'] == 3) {
            $data['equip'] = $this->equipment->find($task['Equipment_id']);
            $data['period'] = $this->period->find($task['Periode_id']);
            $data['loc'] = $this->location->find($task['Location_id']);
            $data['subloc'] = $this->sublocation->find($task['Sublocation_id']);
            $data['checklist'] = $this->check->where('Type_id', $task['Type_id'])->findAll();
            $data['task'] = $task;
            $data['cat'] = $this->category->find($task['TaskType']);
            $data['det'] = $this->cmdetail->where('Task_id', $task['Taskid'])->findAll();
            $data['usage'] = $this->usage->where(['Task_id' => $task['Taskid'], 'Status' => 2])->findAll();
            return view('management/wo_print_cm', $data);
        } else {
            $data['equip'] = $this->equipment->find($task['Equipment_id']);
            $data['period'] = $this->period->find($task['Periode_id']);
            $data['loc'] = $this->location->find($task['Location_id']);
            $data['subloc'] = $this->sublocation->find($task['Sublocation_id']);
            $data['checklist'] = $this->check->where('Type_id', $task['Type_id'])->findAll();
            $data['task'] = $task;
            $data['cat'] = $this->category->find($task['TaskType']);
            $data['det'] = $this->tdetail->where('Task_id', $task['Taskid'])->findAll();
            $data['usage'] = $this->usage->where(['Task_id' => $task['Taskid'], 'Status' => 2])->findAll();
            if ($task['Status'] != 0) {
                return view('management/wo_print', $data);
            } else {
                return view('management/wo_report', $data);
            }
        }
    }

    public function approvewo($id)
    {
        $task = $this->task->find($id);
        if ($task['TaskType'] == 3) {
            $data['title'] = 'Approve work order #' . $id;
            $data['prof'] = profile();
            $data['equip'] = $this->equipment->find($task['Equipment_id']);
            $data['period'] = $this->period->find($task['Periode_id']);
            $data['loc'] = $this->location->find($task['Location_id']);
            $data['subloc'] = $this->sublocation->find($task['Sublocation_id']);
            $data['checklist'] = $this->check->where('Type_id', $task['Type_id'])->findAll();
            $data['task'] = $task;
            $data['cat'] = $this->category->find($task['TaskType']);
            $data['det'] = $this->cmdetail->where('Task_id', $task['Taskid'])->findAll();
            $data['role'] = $this->role->find(session()->get('roleid'));
            return render_templatex('management/approvewocm', $data);
        } else {
            $data['title'] = 'Approve work order #' . $id;
            $data['prof'] = profile();
            $data['equip'] = $this->equipment->find($task['Equipment_id']);
            $data['period'] = $this->period->find($task['Periode_id']);
            $data['loc'] = $this->location->find($task['Location_id']);
            $data['subloc'] = $this->sublocation->find($task['Sublocation_id']);
            $data['checklist'] = $this->check->where('Type_id', $task['Type_id'])->findAll();
            $data['task'] = $task;
            $data['cat'] = $this->category->find($task['TaskType']);
            $data['det'] = $this->tdetail->where('Task_id', $task['Taskid'])->findAll();
            $data['role'] = $this->role->find(session()->get('roleid'));
            return render_templatex('management/approvewo', $data);
        }
    }

    public function sparepart()
    {
        if ($this->request->getPost('opb')) {
            $image = $this->request->getFile('image');
            $name = $image->getName();
            if (!$image->hasMoved()) {

                $data = [
                    'Partid' => $this->request->getPost('partidl'),
                    'Sapid' => null,
                    'Partname' => $this->request->getPost('partname'),
                    'Supplier_id' => $this->request->getPost('supp'),
                    'Quantity' => $this->request->getPost('currstkl'),
                    'Address_id' => $this->request->getPost('addr'),
                    'Minqty' => $this->request->getPost('minqtyl'),
                    'Price' => $this->request->getPost('price'),
                    'Setreminder' => null,
                    'Lastreminder' => null,
                    'Isobsolete' => 0,
                    'Lastupdate' => curr_date(),
                    'Equipment_id' => $this->request->getPost('equip'),
                    'Image' => $name
                ];
                $image->move(FCPATH . 'assets/public/parts/', null, true);
            } else {
                $data = [
                    'Partid' => $this->request->getPost('partidl'),
                    'Equipment_id' => $this->request->getPost('equip'),
                    'Sapid' => null,
                    'Partname' => $this->request->getPost('partname'),
                    'Supplier_id' => $this->request->getPost('supp'),
                    'Quantity' => $this->request->getPost('currstkl'),
                    'Address_id' => $this->request->getPost('addr'),
                    'Minqty' => $this->request->getPost('minqtyl'),
                    'Price' => $this->request->getPost('price'),
                    'Setreminder' => null,
                    'Lastreminder' => null,
                    'Isobsolete' => 0,
                    'Lastupdate' => curr_date(),
                    'Image' => 'noavail.jpg'
                ];
            }
            $log = [
                'Part_id' => $this->request->getPost('partidl'),
                'Quantity' => $this->request->getPost('qtyl'),
                'Price' => $this->request->getPost('price'),
                'OpbNumber' => $this->request->getPost('opb'),
                'Supplier_id' => $this->request->getPost('supp'),
                'Adddate' => curr_date(),
                'Currstock' => $this->request->getPost('currstkl'),
                'Pickuppart' => session()->get('uid')
            ];

            $this->part->save($data);
            $this->add->save($log);
            success_message('New stock added');
            return redirect_to('managements/sparepart');
        } else {
            $data['title'] = 'Part Management';
            $data['stock'] = $this->part->findAll();
            $data['req'] = $this->usage->where('Status', 1)->findAll();
            $data['addr'] = $this->partaddr->findAll();
            $data['supp'] = $this->supplier->findAll();
            $data['equip'] = $this->equipment->findAll();
            $data['prof'] = profile();
            return render_templatex('management/sparepart', $data);
        }
    }

    public function createworeport($id)
    {
        $data['title'] = 'Work orders# ' . $id;
        $data['prof'] = profile();
        $data['id'] = $id;
        $data['usage'] = $this->usage->get_usage($id);
        $task = $this->task->find($id);
        $data['eng'] = $this->user->where('Role_id', 2)->findAll();
        $data['spv'] = $this->user->where('Role_id', 4)->findAll();
        $data['task'] = $task;
        $data['check'] = $this->check->where('Type_id', $task['Type_id'])->findAll();
        if ($task['TaskType'] == 3) {
            return render_templatex('management/taskcm', $data);
        } else {
            return render_templatex('management/pmreport', $data);
        }
    }
}
