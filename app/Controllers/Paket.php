<?php

namespace App\Controllers;

use App\Models\PaketModel;

class Paket extends BaseController
{
    protected $paketModel;
    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }

    public function index()
    {
        $paket = $this->paketModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'paket' => $paket
        ];
        //dd($paket);
        echo view('admin/a_paket', $data);
    }
}
