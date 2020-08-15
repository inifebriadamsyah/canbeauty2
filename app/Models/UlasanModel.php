<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table      = 'ulasan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'ulasan_teks', 'image_pembeli', 'nama_pembeli'];
}
