<?php

use App\Models\UserModel;

function future_date($date, $interval)
{
    $newdate = date_create($date);
    date_add($newdate, date_interval_create_from_date_string($interval . " days"));
    return date_format($newdate, "Y-m-d");
}

function curr_date()
{
    return date('Y-m-d H:i:s', time());
}

function tablex($data = null)
{
    $db = \Config\Database::connect();
    return $builder = $db->table($data);
}

function timedifern($d1, $d2)
{
    $date1 = new DateTime($d1);
    $date2 = new DateTime($d2);

    $intrval = $date1->diff($date2);

    return $intrval->format("%H:%I:%S");
}

function startdate($d)
{
    $date = new DateTime($d);
    return date_format($date, "H:i:s");
}

function getperson($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('user');
    $builder->where('Userid', $id);
    $data = $builder->get()->getRowArray();
    return $data['Fullname'];
}
function equipmentname($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('Equipment');
    $builder->where('Equipmentid', $id);
    $data = $builder->get()->getRowArray();
    return $data['Equipmentname'];
}

function dateonly($d, $d2 = null)
{
    if (!$d) {
        $date = new DateTime($d2);
    } else {
        $date = new DateTime($d);
    }
    return date_format($date, "Y-m-d");
}

function obsolte($id)
{
    if ($id == 1) {
        return "checked='checked'";
    }
}

function notif($req = null)
{
    if ($req) {
        return '<span class="badge text-bg-danger">' . count($req) . '</span>';
    }
}
