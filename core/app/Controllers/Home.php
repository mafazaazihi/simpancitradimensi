<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('template/header')
        .view('template/navbar')
        .view('template/sidebar')
        .view('admin/index')
        .view('template/footer');
    }
}
