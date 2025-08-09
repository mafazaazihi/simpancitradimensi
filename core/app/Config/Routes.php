<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//login
$routes->get('/', 'Auth::index');
$routes->get('auth/resetpass', 'Auth::resetpassword');
$routes->post('auth/resetpass', 'Auth::resetpassword');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

//admin
$routes->get('/test', 'Test::index', ['filter' => 'login']);
$routes->get('/admin', 'Admin::index', ['filter' => 'login']);
$routes->post('admin', 'Admin::index');
$routes->get('admin/menu', 'Admin::menu', ['filter' => 'login']);
$routes->post('admin/menu', 'Admin::menu', ['filter' => 'login']);
//sub menu
$routes->post('admin/submenu', 'Admin::submenu', ['filter' => 'login']);
//role
$routes->get('admin/role', 'Admin::role', ['filter' => 'login']);
$routes->post('admin/role', 'Admin::role', ['filter' => 'login']);
$routes->get('admin/role/(:num)', 'Admin::role/$1', ['filter' => 'login']);
$routes->get('admin/role/(:alpha)', 'Admin::role/$1', ['filter' => 'login']);
//user
$routes->get('admin/users', 'Admin::user', ['filter' => 'login']);
$routes->post('admin/users', 'Admin::user', ['filter' => 'login']);
$routes->get('admin/users/(:num)', 'Admin::user/$1', ['filter' => 'login']);
//task
$routes->get('/task', 'Task::index', ['filter' => 'login']);

//ajax
$routes->post('ajax/changeaccs', 'Ajaxcall::changeaccs');
$routes->post('ajax/machine', 'Ajaxcall::machine');
$routes->post('ajax/getmachinesn', 'Ajaxcall::getmachinesn');
$routes->post('ajax/getchecklist', 'Ajaxcall::getchecklist');
$routes->post('ajax/gettaskdetail', 'Ajaxcall::gettaskdetail');
$routes->post('ajax/getpart', 'Ajaxcall::getpart');
$routes->post('ajax/updatetime', 'Ajaxcall::updatetim');
$routes->post('ajax/entry', 'Ajaxcall::entry');
$routes->post('ajax/obsolete', 'Ajaxcall::obsolete');
$routes->post('ajax/getpartdetail', 'Ajaxcall::getpartdetail');
$routes->post('ajax/getpartlike', 'Ajaxcall::getpartlike');
$routes->post('ajax/rejectpart', 'Ajaxcall::rejectpart');
$routes->post('ajax/approvewo', 'Ajaxcall::approvewo');
$routes->post('ajax/changetskduedate', 'Ajaxcall::changetskduedate');
$routes->post('ajax/assigntask', 'Ajaxcall::assigntask');
$routes->get('ajax/pmcalendar', 'Ajaxcall::pmcalendar');
//api
$routes->get('api/pmcalendar', 'Restfull::getpmcalendar');
//management group
$routes->get('managements/', 'Management::index', ['filter' => 'login']);
$routes->get('managements/(:alpha)', 'Management::index/$1', ['filter' => 'login']);
$routes->get('managements/equipment', 'Management::equipment', ['filter' => 'login']);
$routes->post('managements/equipment', 'Management::equipment', ['filter' => 'login']);
$routes->get('managements/supplier', 'Management::supplier', ['filter' => 'login']);
$routes->post('managements/supplier', 'Management::supplier', ['filter' => 'login']);
$routes->get('managements/checklist', 'Management::checklist', ['filter' => 'login']);
$routes->get('managements/checklist/(:num)', 'Management::checklist/$1', ['filter' => 'login']);
$routes->post('managements/checklist', 'Management::checklist', ['filter' => 'login']);
$routes->post('managements/addchecklist', 'Management::addchecklist', ['filter' => 'login']);
$routes->get('managements/workorder', 'Management::workorder', ['filter' => 'login']);
$routes->post('managements/workorder', 'Management::workorder', ['filter' => 'login']);
$routes->post('managements/sparepart', 'Management::sparepart', ['filter' => 'login']);
$routes->get('managements/sparepart', 'Management::sparepart', ['filter' => 'login']);
$routes->get('managements/woreport/(:num)', 'Management::woreport/$1', ['filter' => 'login']);
$routes->get('managements/approvewo/(:num)', 'Management::approvewo/$1', ['filter' => 'login']);
$routes->get('managements/createworeport/(:num)', 'Management::createworeport/$1', ['filter' => 'login']);

//task group
$routes->get('task/', 'Task::index', ['filter' => 'login']);
$routes->get('task/catalogs', 'Task::catalog', ['filter' => 'login']);
$routes->post('task/', 'Task::index', ['filter' => 'login']);
$routes->get('task/(:num)', 'Task::index/$1', ['filter' => 'login']);
$routes->post('task/workordercm', 'Task::workordercm', ['filter' => 'login']);

//user
$routes->get('user/(:alphanum)', 'User::index/$1', ['filter' => 'user']);
$routes->post('user/changepass', 'User::changepass', ['filter' => 'user']);
$routes->post('user/edit', 'User::edit', ['filter' => 'user']);
