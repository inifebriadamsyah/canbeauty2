<?php

namespace App\Controllers;


use App\Controllers\Footer;
use App\Controllers\Hero;
use App\Controllers\Kontak;
use App\Controllers\Paket;
use App\Controllers\Products;
use App\Controllers\Profile;
use App\Controllers\Testimoni;
use App\Controllers\Ulasan;

use App\Models\FooterModel;
use App\Models\HeroModel;
use App\Models\KontakModel;
use App\Models\PaketModel;
use App\Models\ProductsModel;
use App\Models\ProfileModel;
use App\Models\TestimoniModel;
use App\Models\UlasanModel;

class Main extends BaseController
{
	protected $footer;
	protected $hero;
	protected $kontak;
	protected $paket;
	protected $products;
	protected $profile;
	protected $testimoni;
	protected $ulasan;

	protected $footerModel;
	protected $heroModel;
	protected $kontakModel;
	protected $paketModel;
	protected $productsModel;
	protected $profileModel;
	protected $testimoniModel;
	protected $ulasanModel;

	public function __construct()
	{
		$this->footerModel = new FooterModel();
		$this->heroModel = new HeroModel();
		$this->kontakModel = new KontakModel();
		$this->paketModel = new PaketModel();
		$this->productsModel = new ProductsModel();
		$this->profileModel = new ProfileModel();
		$this->testimoniModel = new TestimoniModel();
		$this->ulasanModel = new UlasanModel();

		$this->footer = new Footer();
		$this->hero = new Hero();
		$this->kontak = new Kontak();
		$this->paket = new Paket();
		$this->products = new Products();
		$this->profile = new Profile();
		$this->testimoni = new Testimoni();
		$this->ulasan = new Ulasan();
	}

	public function index()
	{
		/*
		$hero = $this->heroModel->findAll();
		$data = [
			'title' => 'Admin Canbeauty.id',
			'hero' => $hero
		];
		//dd($hero);
		echo view('admin/p_hero', $data);
		
		$profile = $this->profileModel->findAll();
		$data = [
			//'title' => 'Admin Canbeauty.id',
			'profile' => $profile
		];
		//dd($hero);
		echo view('admin/p_profile', $data);
		*/

		echo view('main/p_header');
		$dataHero = $this->hero->getView();
		$dataProfile = $this->profile->getView();
		$dataProducts = $this->products->getView();
		$dataPaket = $this->paket->getView();
		//echo view('main/p_testimoni');
		$dataTestimoni = $this->testimoni->getView();
		$dataUlasan = $this->ulasan->getView();
		$dataKontak = $this->kontak->getView();
		$dataFooter = $this->footer->getView();

		/*
		echo view('main/p_header');
		echo view('main/p_hero');
		echo view('main/p_profile');
		echo view('main/p_products');
		echo view('main/p_paket');
		
		echo view('main/p_ulasan');
		echo view('main/p_contact');
		echo view('main/p_footer');
		*/
	}
}
