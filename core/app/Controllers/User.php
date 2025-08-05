<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->role = new RoleModel();
    }

    public function index($id)
    {
        $prof = session()->get('uid');
        if ($id != $prof) {
            fail_message('You are not allowed');
            audit_log($prof . ' trying to access profile ' . $id);
            return redirect_to('user/' . $prof);
        } else {
            $prof = profile();
            $data['title'] = 'User';
            $data['prof'] = $prof;
            $data['role'] = $this->role->find($prof['Role_id']);
            return render_templatex('user/index', $data);
        }
    }

    public function changepass()
    {
        $prof = profile();
        $oldpass = $this->request->getPost('prevpass');
        $newpass = $this->request->getPost('password');
        if (password_verify($oldpass, $prof['Password'])) {
            $data = [
                'Userid' => $prof['Userid'],
                'Password' => password_hash($newpass, PASSWORD_DEFAULT)
            ];
            $this->user->save($data);
            audit_log($prof['Userid'] . ' changed new password');
            success_message('New password saved');
            return redirect_to('user/' . $prof['Userid']);
        } else {
            fail_message('Old password wrong');
            return redirect_to('user/' . $prof['Userid']);
        }
    }

    public function edit()
    {
        $full = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $image = $this->request->getFile('image');
        $prof = profile();
        $newimage = $image->getName();
        if (!$image->hasMoved()) {
            $data = [
                'Userid' => $prof['Userid'],
                'Fullname' => $full,
                'Email' => $email,
                'Image' => $newimage
            ];

            //$new=WRITEPATH.'assets/'.$image->store();
            $image->move(FCPATH . 'assets/vendor/src/assets/images/faces/', null, true);
            $this->user->save($data);
            success_message('User profile updated');
            return redirect_to('user/' . $prof['Userid']);
        }
    }
}
