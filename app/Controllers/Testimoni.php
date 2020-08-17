<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\TestimoniCategoryModel;

class Testimoni extends BaseController
{
    protected $testimoniModel;
    protected $testimoniCategoryModel;
    public function __construct()
    {
        $this->testimoniModel = new TestimoniModel();
        $this->testimoniCategoryModel = new TestimoniCategoryModel();
    }

    public function index()
    {
        session();
        if (session()->get('email') == '') {
            session()->setFlashdata('failed', 'Silakan Login terlebih dahulu!');
            return redirect()->to(base_url('users'));
        }
        $testimoni = $this->testimoniModel->findAll();
        $testimoni_category = $this->testimoniCategoryModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'testimoni' => $testimoni,
            'testimoni_category' => $testimoni_category,
            'validation' => \Config\Services::validation()
        ];
        //dd($testimoni);
        echo view('admin/a_testimoni', $data);
    }

    public function getView()
    {
        $testimoni = $this->testimoniModel->findAll();
        $testimoni_category = $this->testimoniCategoryModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'testimoni' => $testimoni,
            'testimoni_category' => $testimoni_category
        ];
        //dd($testimoni);
        echo view('main/p_testimoni', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'category' => 'required'
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
            // return redirect()->to('/testimoni')->withInput()->with('validation', $validation);
            return redirect()->to('/testimoni')->withInput();
        }

        $fileimage = $this->request->getFile('image');

        if ($fileimage->getError() == 4) {
            $nameimage = 'slide3.jpeg';
        } else {
            $fileimage->move('img');
            $nameimage = $fileimage->getName();
        }

        $this->testimoniModel->save([
            'category' => $this->request->getVar('category'),
            'image' => $nameimage
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/testimoni');
    }

    public function delete($id)
    {
        $testimoni = $this->testimoniModel->find($id);

        if ($testimoni['image'] != 'slide3.jpeg') {
            unlink('img/' . $testimoni['image']);
        }

        $this->testimoniModel->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');

        return redirect()->to('/testimoni');
    }

    public function update($id)
    {
        if (!$this->validate([
            'category' => 'required'
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
            return redirect()->to('/testimoni')->withInput();
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

        $this->testimoniModel->save([
            'id' => $id,
            'category' => $this->request->getVar('category'),
            'image' =>  $nameimage
        ]);

        session()->setFlashdata('update', 'Data berhasil Diupdate.');

        return redirect()->to('/testimoni');
    }
}
