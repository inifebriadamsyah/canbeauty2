<?php

namespace App\Controllers;

use App\Models\PaketModel;

class Paket extends BaseController
{
    protected $paketModel;
    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }

    public function index()
    {
        session();
        $paket = $this->paketModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'paket' => $paket,
            'validation' => \Config\Services::validation()
        ];
        //dd($paket);
        echo view('admin/a_paket', $data);
    }

    public function getView()
    {
        $paket = $this->paketModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'paket' => $paket
        ];
        //dd($paket);
        echo view('main/p_paket', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama_paket' => 'required',
            'deskripsi_paket' => 'required',
            'harga_paket' => 'required'
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
            // return redirect()->to('/paket')->withInput()->with('validation', $validation);
            return redirect()->to('/paket')->withInput();
        }

        $fileImage = $this->request->getFile('image');

        if ($fileImage->getError() == 4) {
            $nameImage = 'slide3.jpeg';
        } else {
            $fileImage->move('img');
            $nameImage = $fileImage->getName();
        }

        $this->paketModel->save([
            'nama_paket' => $this->request->getVar('nama_paket'),
            'deskripsi_paket' => $this->request->getVar('deskripsi_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'image' => $nameImage
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/paket');
    }

    public function delete($id)
    {
        $paket = $this->paketModel->find($id);

        if ($paket['image'] != 'paket1.png') {
            unlink('img/' . $paket['image']);
        }

        $this->paketModel->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');

        return redirect()->to('/paket');
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_paket' => 'required',
            'deskripsi_paket' => 'required',
            'harga_paket' => 'required'
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
            return redirect()->to('/paket')->withInput();
        }

        $fileImage = $this->request->getFile('image');
        //$nameImage = "";

        if ($fileImage->getError() == 4) {
            $nameImage = $this->request->getVar('oldImage');;
        } else {
            $fileImage->move('img');
            $nameImage = $fileImage->getName();

            unlink('img/' .  $this->request->getVar('oldImage'));
        }

        $this->paketModel->save([
            'id' => $id,
            'nama_paket' => $this->request->getVar('nama_paket'),
            'deskripsi_paket' => $this->request->getVar('deskripsi_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'image' => $nameImage
        ]);

        session()->setFlashdata('update', 'Data berhasil Diupdate.');

        return redirect()->to('/paket');
    }
}
