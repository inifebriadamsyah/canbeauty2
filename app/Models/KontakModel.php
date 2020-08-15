<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $table      = 'kontak';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'alamat', 'alamat_link', 'whatsapp', 'whatsapp_link', 'facebook', 'facebook_link', 'instagram', 'instagram_link'];
}
