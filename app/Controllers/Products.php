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
        session();
        $products = $this->productsModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'products' => $products,
            'validation' => \Config\Services::validation()
        ];
        //dd($products);
        echo view('admin/a_products', $data);
    }

    public function getView()
    {
        $products = $this->productsModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'products' => $products
        ];
        //dd($products);
        echo view('main/p_products', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required'
            //'image' => 'required'
        ], [
            'image' => [
                'rules' => 'max_size[image,8192]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'broo, images file size is too big!',
                    'is_image' => 'Choose only image format broo!',
                    'mime_in' => 'Choose only image format broo!'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/products')->withInput()->with('validation', $validation);
            return redirect()->to('/products')->withInput();
        }

        $fileimage = $this->request->getFile('image');

        if ($fileimage->getError() == 4) {
            $nameimage = 'slide3.jpeg';
        } else {
            $fileimage->move('img');
            $nameimage = $fileimage->getName();
        }

        $this->productsModel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'image' => $nameimage
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/products');
    }

    public function delete($id)
    {
        $products = $this->productsModel->find($id);

        if ($products['image'] != 'slide3.jpeg') {
            unlink('img/' . $products['image']);
        }

        $this->productsModel->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');

        return redirect()->to('/products');
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required'
            //'image' => 'required'
        ], [
            'image' => [
                'rules' => 'max_size[image,8192]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'broo, images file size is too big!',
                    'is_image' => 'Choose only image format broo!',
                    'mime_in' => 'Choose only image format broo!'
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/products')->withInput();
        }

        $fileimage = $this->request->getFile('image');
        //$nameimage = "";

        if ($fileimage->getError() == 4) {
            $nameimage = $this->request->getVar('oldimage');;
        } else {
            $fileimage->move('img');
            $nameimage = $fileimage->getName();

            unlink('img/' .  $this->request->getVar('oldimage'));
        }

        $this->productsModel->save([
            'id' => $id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'image' =>  $nameimage
        ]);

        session()->setFlashdata('update', 'Data berhasil Diupdate.');

        return redirect()->to('/products');
    }
}
