<?php

namespace App\Controllers;

use App\Models\UlasanModel;

class Ulasan extends BaseController
{
    protected $ulasanModel;
    public function __construct()
    {
        $this->ulasanModel = new UlasanModel();
    }

    public function index()
    {
        session();
        if (session()->get('email') == '') {
            session()->setFlashdata('failed', 'Silakan Login terlebih dahulu!');
            return redirect()->to(base_url('users'));
        }
        $ulasan = $this->ulasanModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'ulasan' => $ulasan,
            'validation' => \Config\Services::validation()
        ];
        //dd($ulasan);
        echo view('admin/a_ulasan', $data);
    }

    public function getView()
    {
        $ulasan = $this->ulasanModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'ulasan' => $ulasan
        ];
        //dd($ulasan);
        echo view('main/p_ulasan', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'ulasan_teks' => 'required',
            'nama_pembeli' => 'required'
            //'image_pembeli' => 'required'
        ], [
            'image_pembeli' => [
                'rules' => 'max_size[image_pembeli,8192]|is_image[image_pembeli]|mime_in[image_pembeli,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'broo, images file size is too big!',
                    'is_image' => 'Choose only image format broo!',
                    'mime_in' => 'Choose only image format broo!'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/ulasan')->withInput()->with('validation', $validation);
            return redirect()->to('/ulasan')->withInput();
        }

        $fileimage = $this->request->getFile('image_pembeli');

        if ($fileimage->getError() == 4) {
            $nameimage = 'slide3.jpeg';
        } else {
            $fileimage->move('img');
            $nameimage = $fileimage->getName();
        }

        $this->ulasanModel->save([
            'ulasan_teks' => $this->request->getVar('ulasan_teks'),
            'nama_pembeli' => $this->request->getVar('nama_pembeli'),
            'image_pembeli' => $nameimage
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/ulasan');
    }

    public function delete($id)
    {
        $ulasan = $this->ulasanModel->find($id);

        if ($ulasan['image_pembeli'] != 'slide3.jpeg') {
            unlink('img/' . $ulasan['image_pembeli']);
        }

        $this->ulasanModel->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');

        return redirect()->to('/ulasan');
    }

    public function update($id)
    {
        if (!$this->validate([
            'ulasan_teks' => 'required',
            'nama_pembeli' => 'required'
            //'image_pembeli' => 'required'
        ], [
            'image_pembeli' => [
                'rules' => 'max_size[image,8192]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'broo, images file size is too big!',
                    'is_image' => 'Choose only image format broo!',
                    'mime_in' => 'Choose only image format broo!'
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/ulasan')->withInput();
        }

        $fileimage = $this->request->getFile('image_pembeli');
        //$nameimage = "";

        if ($fileimage->getError() == 4) {
            $image_pembeli = $this->request->getVar('oldimage');;
        } else {
            $fileimage->move('img');
            $image_pembeli = $fileimage->getName();

            unlink('img/' .  $this->request->getVar('oldimage'));
        }

        $this->ulasanModel->save([
            'id' => $id,
            'ulasan_teks' => $this->request->getVar('ulasan_teks'),
            'nama_pembeli' => $this->request->getVar('nama_pembeli'),
            'image_pembeli' =>  $image_pembeli
        ]);

        session()->setFlashdata('update', 'Data berhasil Diupdate.');

        return redirect()->to('/ulasan');
    }
}
