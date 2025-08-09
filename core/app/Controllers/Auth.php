<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->rolemodel = new RoleModel();
    }
    public function index()
    {
        $data['title'] = 'Login';
        return view('template/auth_h', $data)
            . view('auth/index', $data)
            . view('template/auth_f');
    }

    public function login()
    {
        $id = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        $udata = $this->UserModel->find($id);
        if ($udata) {
            $role = $this->rolemodel->find($udata['Role_id']);
            if ($udata['Active'] == 1) {
                if (password_verify($pass, $udata['Password'])) {
                    $s_data = [
                        'uid' => $udata['Userid'],
                        'roleid' => $udata['Role_id']
                    ];
                    $date = [
                        'Userid' => $udata['Userid'],
                        'Lastlogin' => date('Y-m-d H:i:s', time())
                    ];
                    $this->UserModel->save($date);
                    session()->set($s_data);
                    $this->send_mail($udata['Email']);
                    success_message('Wellcome buddy');
                    return redirect_to($role['Defaultpage']);
                } else {
                    fail_message('Wrong password');
                    return redirect_to('/');
                }
            } else {
                fail_message('User inactive');
                return redirect_to('/');
            }
        } else {
            fail_message('Userid not exist');
            return redirect_to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        success_message('Logged out');
        return redirect_to('/');
    }

    public function resetpassword()
    {
        if ($this->request->getPost('userid')) {

            $data = [
                'Userid' => $this->request->getPost('userid'),
                'Resetpass' => 1,
                'Active' => 0
            ];
            $this->UserModel->save($data);
            success_message('Please contact your administrator to complete');
            return redirect_to('/');
        } else {
            $data['title'] = 'Reset Password';
            return view('template/auth_h', $data)
                . view('auth/resetpass', $data)
                . view('template/auth_f');
        }
    }
    private function send_mail($mail)
    {
        $html = '<!DOCTYPE html>
                <html>
                <head>
                <title>Page Title</title>
                </head>
                <body>

                <h1>This is a Heading</h1>
                <p>This is a paragraph.</p>

                </body>
                </html>';
        $email = Services::email();
        $email->setFrom('system');
        $email->setTo($email);
        $email->setSubject('Test');
        $email->setMessage($html);
    }
}
