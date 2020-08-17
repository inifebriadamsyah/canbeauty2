<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		session();
		if (session()->get('email') == '') {
			session()->setFlashdata('failed', 'Silakan Login terlebih dahulu!');
			return redirect()->to(base_url('users'));
		}
		return view('welcome_message');
	}
}
