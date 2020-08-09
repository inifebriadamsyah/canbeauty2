<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $profileModel;
    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        $profile = $this->profileModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'profile' => $profile
        ];
        //dd($profile);
        echo view('admin/a_profile', $data);
    }

    public function getView()
    {

        $profile = $this->profileModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'profile' => $profile
        ];
        //dd($profile);
        echo view('main/p_profile', $data);
    }
}
