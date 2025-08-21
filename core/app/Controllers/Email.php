<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Email extends BaseController
{
    public function __construct()
    {
        $this->task = new TaskModel();
        $this->user = new UserModel();
        $this->table = new \CodeIgniter\View\Table();
    }
    public function sendbacklog()
    {
        $spv = $this->user->whereIn('Role_id', [4, 3, 5])->findAll();
        $spvs = "";
        foreach ($spv as $key => $value) {
            $spvs .= '"' . $value['Email'] . '",';
        }
        $spvs = rtrim($spvs, ",");
        $template = [
            'table_open' => '<table border="1" cellpadding="4" cellspacing="0">',

            'thead_open'  => '<thead>',
            'thead_close' => '</thead>',

            'heading_row_start'  => '<tr>',
            'heading_row_end'    => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end'   => '</th>',

            'tfoot_open'  => '<tfoot>',
            'tfoot_close' => '</tfoot>',

            'footing_row_start'  => '<tr>',
            'footing_row_end'    => '</tr>',
            'footing_cell_start' => '<td>',
            'footing_cell_end'   => '</td>',

            'tbody_open'  => '<tbody>',
            'tbody_close' => '</tbody>',

            'row_start'  => '<tr>',
            'row_end'    => '</tr>',
            'cell_start' => '<td>',
            'cell_end'   => '</td>',

            'row_alt_start'  => '<tr>',
            'row_alt_end'    => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end'   => '</td>',

            'table_close' => '</table>',
        ];

        $data = $this->task->get_foremail();
        $this->table->setTemplate($template);
        $this->table->setHeading(['Equipmentname' => 'Equipment', 'Categoryname' => 'Tipe', 'Duedate' => 'Duedate'])
            ->setSyncRowsWithHeading(true);
        $tbl1 = $this->table->generate($data);
        $html = '<!DOCTYPE html>
                <html>
                <head>
                <title>Page Title</title>
                </head>
                <body>
                <p>Dear User.</p>
                <p>This following task(s) was overdue please take action!.</p>' . $tbl1 . '

                </body>
                </html>';
        $email = service('email');
        $email->setFrom('system');
        $email->setTo($spvs);
        $email->setSubject('Overdue task (Backlog) - ' . curr_date());
        $email->setMessage($html);
        if (count($data) > 0) {
            $email->send();
        }
    }

    public function sendupcoming($day)
    {
        $spv = $this->user->whereIn('Role_id', [4, 3, 5])->findAll();
        $spvs = "";
        foreach ($spv as $key => $value) {
            $spvs .= '"' . $value['Email'] . '",';
        }
        $spvs = rtrim($spvs, ",");


        $template = [
            'table_open' => '<table border="1" cellpadding="4" cellspacing="0">',

            'thead_open'  => '<thead>',
            'thead_close' => '</thead>',

            'heading_row_start'  => '<tr>',
            'heading_row_end'    => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end'   => '</th>',

            'tfoot_open'  => '<tfoot>',
            'tfoot_close' => '</tfoot>',

            'footing_row_start'  => '<tr>',
            'footing_row_end'    => '</tr>',
            'footing_cell_start' => '<td>',
            'footing_cell_end'   => '</td>',

            'tbody_open'  => '<tbody>',
            'tbody_close' => '</tbody>',

            'row_start'  => '<tr>',
            'row_end'    => '</tr>',
            'cell_start' => '<td>',
            'cell_end'   => '</td>',

            'row_alt_start'  => '<tr>',
            'row_alt_end'    => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end'   => '</td>',

            'table_close' => '</table>',
        ];

        $data = $this->task->get_foremail($day);
        $this->table->setTemplate($template);
        $this->table->setHeading(['Equipmentname' => 'Equipment', 'Categoryname' => 'Tipe', 'Duedate' => 'Duedate'])
            ->setSyncRowsWithHeading(true);
        $tbl1 = $this->table->generate($data);
        $html = '<!DOCTYPE html>
                <html>
                <head>
                <title>Page Title</title>
                </head>
                <body>
                <p>Dear User.</p>
                <p>This following task(s) will overdue in ' . $day . ' days please be prepared!.</p>' . $tbl1 . '

                </body>
                </html>';
        $email = service('email');
        $email->setFrom('SIMPAN system');
        $email->setTo($spvs);
        $email->setSubject('Upcoming task in ' . $day . ' Days - ' . curr_date());
        $email->setMessage($html);
        if (count($data) > 0) {
            $email->send();
        }
    }
}
