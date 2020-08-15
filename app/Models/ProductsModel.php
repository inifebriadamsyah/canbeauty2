<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama_produk', 'deskripsi', 'image'];
}
