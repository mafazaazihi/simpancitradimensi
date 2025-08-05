<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'Userid';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['Userid', 'Fullname', 'Password', 'Role_id', 'Image', 'Lastlogin', 'Active', 'Email', 'Resetpass'];

    public function user_w_role()
    {
        $db = \Config\Database::connect();
        $sql = 'select*from user u inner join userrole ur on u.Role_id=ur.Roleid';
        return $db->query($sql)->getResultArray();
    }
}
