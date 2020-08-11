<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroModel extends Model
{
    protected $table      = 'hero';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'judul', 'deskripsi', 'button', 'background'];
}
