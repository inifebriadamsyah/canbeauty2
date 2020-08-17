<?php

namespace App\Controllers;

class Admin extends BaseController
{

	public function index()
	{
		session();
		if (session()->get('email') == '') {
			session()->setFlashdata('failed', 'Silakan Login terlebih dahulu!');
			return redirect()->to(base_url('users'));
		}
		$data = [
			'title' => 'Admin | Canbeauty.id',
		];
		return view('admin/a_hero', $data);
	}

	public function profile()
	{
		$data = [
			'title' => 'Admin | Canbeauty.id',
		];
		return view('admin/a_profile', $data);
	}

	public function products()
	{
		$data = [
			'title' => 'Admin | Canbeauty.id',
		];
		return view('admin/a_products', $data);
	}

	public function paket()
	{
		$data = [
			'title' => 'Admin | Canbeauty.id',
		];
		return view('admin/a_paket', $data);
	}

	public function testimoni()
	{
		$data = [
			'title' => 'Admin | Canbeauty.id',
		];
		return view('admin/a_testimoni', $data);
	}

	public function ulasan()
	{
		$data = [
			'title' => 'Admin | Canbeauty.id',
		];
		return view('admin/a_ulasan', $data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Admin | Canbeauty.id',
		];
		return view('admin/a_contact', $data);
	}

	public function footer()
	{
		$data = [
			'title' => 'Admin | Canbeauty.id',
		];
		return view('admin/a_footer', $data);
	}
}
