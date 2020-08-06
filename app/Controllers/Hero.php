<?php

namespace App\Controllers;

use app\Models\HeroModel;

class Hero extends BaseController
{
    protected $heroModel;
    public function __construct()
    {
        $this->heroModel = new HeroModel();
    }

    public function index()
    {
        $hero = $this->heroModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'hero' => $hero
        ];

        dd($hero);

        return view('admin/a_hero', $data);
    }
}
