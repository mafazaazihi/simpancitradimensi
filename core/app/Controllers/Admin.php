<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\RoleModel;
use App\Models\SubmenuModel;
use App\Models\UserModel;


class Admin extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new UserModel();
        $this->menumodel = new MenuModel();
        $this->submenu = new SubmenuModel();
        $this->rolemodel = new RoleModel();
    }
    public function index(): string
    {
        $data['title'] = 'Admin Page';
        $data['prof'] = profile();
        return render_templatex('admin/index', $data);
    }

    public function menu()
    {
        if ($this->request->getPost('menuname')) {
            $data = [
                'Menuname' => $this->request->getPost('menuname'),
                'Icon' => $this->request->getPost('icon')
            ];
            $this->menumodel->save($data);
            success_message('New menu added');
            return redirect_to('admin/menu');
        } elseif ($this->request->getPost('emenuname')) {
            $data = [
                'Menuid' => $this->request->getPost('menuid'),
                'Menuname' => $this->request->getPost('emenuname')
            ];
            $this->menumodel->save($data);
            success_message('Menu updated');
            return redirect_to('admin/menu');
        } else {
            $data['menu'] = $this->menumodel->findAll();
            $data['submenu'] = $this->submenu->getsubmenu();
            $data['prof'] = profile();
            $data['title'] = 'Menu Management';
            return render_templatex('admin/menu', $data);
        }
    }

    public function submenu()
    {
        if ($this->request->getPost('submenu')) {
            $data = [
                'Tittle' => $this->request->getPost('submenu'),
                'Menu_id' => $this->request->getPost('menu'),
                'Url' => $this->request->getPost('url')
            ];

            $this->submenu->save($data);
            success_message('New sub menu added');
            return redirect_to('admin/menu');
        } else {
            $data = [
                'Submenuid' => $this->request->getPost('submenuid'),
                'Tittle' => $this->request->getPost('esubmenu'),
                'Url' => $this->request->getPost('eurl')
            ];

            $this->submenu->save($data);
            success_message('Sub menu updated');
            return redirect_to('admin/menu');
        }
    }

    public function role($id = null)
    {
        if ($this->request->getPost('role')) {
            $data = [
                'Rolename' => $this->request->getPost('role'),
                'Defaultpage' => $this->request->getPost('defpage')
            ];
            $this->rolemodel->save($data);
            success_message('New role added');
            return redirect_to('admin/role');
        } elseif ($id) {
            $x = $this->rolemodel->find($id);
            $data['role'] = $x;
            $data['menu'] = $this->menumodel->findAll();
            $data['prof'] = profile();
            $data['title'] = 'Role Access :' . $x['Rolename'];
            return render_templatex('admin/roleaccess', $data);
        } elseif ($this->request->getPost('erole')) {
            $data = [
                'Roleid' => $this->request->getPost('roleid'),
                'Rolename' => $this->request->getPost('erole'),
                'Defaultpage' => $this->request->getPost('edefpage')
            ];
            $this->rolemodel->save($data);
            success_message('Role updated');
            return redirect_to('admin/role');
        } else {
            $data['role'] = $this->rolemodel->findAll();
            $data['prof'] = profile();
            $data['title'] = 'Role Management';
            return render_templatex('admin/role', $data);
        }
    }

    public function user($id = null)
    {
        if ($this->request->getPost('fullname')) {
            $data = [
                'Userid' => $this->request->getPost('userid'),
                'Fullname' => $this->request->getPost('fullname'),
                'Email' => $this->request->getPost('email'),
                'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'Image' => 'Default.jpg',
                'Lastlogin' => null,
                'Role_id' => $this->request->getPost('role'),
                'Active' => 1

            ];
            $this->usermodel->save($data);
            success_message('New user added');
            return redirect_to('admin/users');
        } elseif ($this->request->getPost('ruserid')) {
            $data = [
                'Userid' => $this->request->getPost('ruserid'),
                'Password' => password_hash($this->request->getPost('rpassword'), PASSWORD_DEFAULT),
                'Active' => 1,
                'Resetpass' => 0

            ];
            $this->usermodel->save($data);
            success_message('Password successfully reset');
            return redirect_to('admin/users');
        } elseif ($id) {
            $data = [
                'Userid' => $id,
                'Active' => 0
            ];
            $this->usermodel->save($data);
            fail_message('User deleted');
            return redirect_to('admin/users');
        } else {
            $data['prof'] = profile();
            $data['title'] = 'Users';
            $data['users'] = $this->usermodel->user_w_role();
            $data['role'] = $this->rolemodel->findAll();
            return render_templatex('admin/user', $data);
        }
    }
}
