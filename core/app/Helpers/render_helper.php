<?php

function render_templatex($page = null, $data = array())
{
    return view('template/header', $data)
        . view('template/navbar', $data)
        . view('template/sidebarx', $data)
        . view($page, $data)
        . view('template/footer');
}

function profile($idx = null)
{
    if ($idx) {
        $db = model('UserModel');
        $id = $idx;
        return $db->find($id);
    } else {
        $db = model('UserModel');
        $id = session()->get('uid');
        return $db->find($id);
    }
}
