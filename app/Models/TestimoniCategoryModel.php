<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimoniModel extends Model
{
    protected $table      = 'testimoni_category';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'category'];
}
