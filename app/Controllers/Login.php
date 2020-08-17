<?php

namespace App\Controllers;

use App\Models\loginModel;

class Login extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
        helper(['form']);
    }

    public function index()
    {
        //session();
        $login = $this->loginModel->findAll();

        $data = [
            'title' => 'Admin Canbeauty.id',
            'login' => $login,
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/login')
    }

    public function cekLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $check = $this->loginModel->cekLogin($email, $password);
        if (($check['email'] == $email) && ($check['password'] == $password)) {
            session()->set('email', $check['email']);
            session()->set('password', $check['password']);
            return redirect()->to('admin/a_hero');
        } else {
            session()->setFlashdata('failed', 'email dan password salah!!!');
            return redirect()->to('login');
        }
    }
}
