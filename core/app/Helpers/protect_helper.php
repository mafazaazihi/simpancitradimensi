<?php

function checkaccess($role, $menu)
{
    $db = \Config\Database::connect();
    $sql = 'select * from useraccessmenu where Role_id=? and Menu_id=?';
    $x = $db->query($sql, [$role, $menu])->getRowArray();

    if ($x > 1) {
        return 'checked';
    }
}

function uacmid($role, $menu)
{
    $db = \Config\Database::connect();
    $sql = 'select * from useraccessmenu where Role_id=? and Menu_id=?';
    $x = $db->query($sql, [$role, $menu])->getRowArray();

    if ($x > 1) {
        return $x['Uacmid'];
    }
}
