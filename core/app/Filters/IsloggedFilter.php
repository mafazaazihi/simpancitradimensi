<?php

namespace App\Filters;

use App\Models\MenuModel;
use App\Models\RoleaccsModel;
use CodeIgniter\Database\Config;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsloggedFilter implements FilterInterface
{
    public function __construct()
    {
        $this->menumodel = new MenuModel();
        $this->roleacs = new RoleaccsModel();
    }
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('uid')) {
            session()->setFlashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Please process with log in<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/');
        } else {
            $roleid = session()->get('roleid');
            $menuname = request()->getUri()->getSegment(1);
            $db = \Config\Database::connect();
            $menus = 'select*from usermenu where Menuname=?';
            $mneu = $db->query($menus, [$menuname])->getRowArray();
            $ac = 'select*from useraccessmenu where Menu_id=? and Role_id=?';
            $accs = $db->query($ac, [$mneu['Menuid'], $roleid])->getNumRows();
            if ($accs < 1) {
                return redirect()->to('error404');
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
