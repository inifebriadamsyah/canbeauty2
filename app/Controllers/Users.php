<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        helper(['form']);
    }

    public function index()
    {
        session();
        $login = $this->usersModel->findAll();
        helper(['form']);
        $data = [
            'title' => 'Login Admin Canbeauty.id',
            'login' => $login
            //'validation' => \Config\Services::validation()
        ];
        echo view('admin/login', $data);
    }


    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $check = $this->UsersModel->cekLogin($email, $password);
        if (($check['email'] != $email) && ($check['password'] != $password)) {
            session()->setFlashdata('failed', 'Email atau password salah!!!');
            return redirect()->to(base_url('login'));
        } else {
            session()->set('email', $check['email']);
            session()->set('password', $check['password']);
            if (session()->get('email')) {
                return redirect()->to(base_url('hero'));
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
