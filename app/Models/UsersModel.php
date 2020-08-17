<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'email', 'password'];

    public function cekLogin($email, $password)
    {
        return $this->db->table('users')
            ->where(array('email' => $email, 'password' => $password))
            ->get()->getRowArray();
    }
}
