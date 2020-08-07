<?php

namespace App\Controllers;

use App\Models\FooterModel;

class Footer extends BaseController
{
    protected $footerModel;
    public function __construct()
    {
        $this->footerModel = new FooterModel();
    }

    public function index()
    {
        $footer = $this->footerModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'footer' => $footer
        ];
        //dd($Footer);
        echo view('admin/a_footer', $data);
    }
}
