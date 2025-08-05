<?php

function audit_log($message)
{
    $db = \Config\Database::connect();
    $builder = $db->table('auditlog');
    $data = [
        'Session_id' => session_id(),
        'Userid' => session()->get('uid'),
        'Auditdate' => curr_date(),
        'Action' => $message
    ];

    $builder->insert($data);
}
