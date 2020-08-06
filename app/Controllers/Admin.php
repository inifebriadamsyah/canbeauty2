<?php

namespace App\Controllers;



class Admin extends BaseController
{
	protected $heroModel;
	public function __construct()
	{
		//$this->heroModel = new HeroModel();
	}

	public function index()
	{
		//$hero = $this->heroModel->findAll();
		$data = [
			'title' => 'Admin Canbeauty.id',
			//'hero' => $hero
		];

		echo view('admin/template');
		echo view('admin/a_hero');
		echo view('admin/a_profile');
		echo view('admin/a_products');
		echo view('admin/a_paket');
		echo view('admin/a_testimoni');
		echo view('admin/a_ulasan');
		echo view('admin/a_contact');
		echo view('admin/a_footer');
	}

	//--------------------------------------------------------------------
}
