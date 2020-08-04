<?php

namespace App\Controllers;

class Main extends BaseController
{
	public function index()
	{
		echo view('main/p_header');
		echo view('main/p_hero');
		echo view('main/p_profile');
		echo view('main/p_products');
		echo view('main/p_paket');
		echo view('main/p_testimoni');
		echo view('main/p_ulasan');
		echo view('main/p_contact');
		echo view('main/p_footer');
	}
}
