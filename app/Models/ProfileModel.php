<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table      = 'profil';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', '1st_desc', 'sub_title', '2nd_desc', '3nd_desc'];
}
