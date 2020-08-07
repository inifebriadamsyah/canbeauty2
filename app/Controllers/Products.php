<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class Products extends BaseController
{
    protected $productsModel;
    public function __construct()
    {
        $this->productsModel = new ProductsModel();
    }

    public function index()
    {
        $products = $this->productsModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'products' => $products
        ];
        //dd($products);
        echo view('admin/a_products', $data);
    }
}
