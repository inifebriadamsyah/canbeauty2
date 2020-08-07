<?php

namespace App\Controllers;

use App\Models\UlasanModel;

class Ulasan extends BaseController
{
    protected $ulasanModel;
    public function __construct()
    {
        $this->ulasanModel = new UlasanModel();
    }

    public function index()
    {
        $ulasan = $this->ulasanModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'ulasan' => $ulasan
        ];
        //dd($ulasan);
        echo view('admin/a_ulasan', $data);
    }
}
