<?php

namespace App\Controllers;

use App\Models\TestimoniModel;

class Testimoni extends BaseController
{
    protected $testimoniModel;
    public function __construct()
    {
        $this->testimoniModel = new TestimoniModel();
    }

    public function index()
    {
        $testimoni = $this->testimoniModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'testimoni' => $testimoni
        ];
        //dd($testimoni);
        echo view('admin/a_testimoni', $data);
    }
}
