<?php

namespace App\Controllers;

class Report extends BaseController
{
    public function index()
    {
        $data['title'] = 'Report';
        $data['prof'] = profile();
    }
}
