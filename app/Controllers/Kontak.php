<?php

namespace App\Controllers;

use App\Models\KontakModel;

class Kontak extends BaseController
{
    protected $kontakModel;
    public function __construct()
    {
        $this->kontakModel = new KontakModel();
    }

    public function index()
    {
        $kontak = $this->kontakModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'kontak' => $kontak
        ];
        //dd($ulasan);
        return view('admin/a_contact', $data);
    }

    public function utama()
    {
        $kontak = $this->kontakModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'kontak' => $kontak
        ];
        //dd($ulasan);
        echo view('admin/a_contact', $data);
    }
}
