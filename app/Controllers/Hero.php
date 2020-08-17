<?php

namespace App\Controllers;

use App\Models\HeroModel;

class Hero extends BaseController
{
    protected $heroModel;
    public function __construct()
    {
        $this->heroModel = new HeroModel();
    }

    public function index()
    {
        session();
        if (session()->get('email') == '') {
            session()->setFlashdata('failed', 'Silakan Login terlebih dahulu!');
            return redirect()->to(base_url('users'));
        }
        $hero = $this->heroModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'hero' => $hero,
            'validation' => \Config\Services::validation()
        ];
        //dd($hero);
        echo view('admin/a_hero', $data);
    }

    public function getView()
    {
        $hero = $this->heroModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'hero' => $hero
        ];
        //dd($hero);
        echo view('main/p_hero', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'button' => 'required'
            //'background' => 'required'
        ], [
            'background' => [
                'rules' => 'max_size[background,8192]|is_image[background]|mime_in[background,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'broo, backgrounds file size is too big!',
                    'is_image' => 'Choose only image format broo!',
                    'mime_in' => 'Choose only image format broo!'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/hero')->withInput()->with('validation', $validation);
            return redirect()->to('/hero')->withInput();
        }

        $fileBackground = $this->request->getFile('background');

        if ($fileBackground->getError() == 4) {
            $nameBackground = 'slide3.jpeg';
        } else {
            $fileBackground->move('img');
            $nameBackground = $fileBackground->getName();
        }

        $this->heroModel->save([
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'button' => $this->request->getVar('button'),
            'background' => $nameBackground
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/hero');
    }

    public function delete($id)
    {
        $hero = $this->heroModel->find($id);

        if ($hero['background'] != 'slide3.jpeg') {
            unlink('img/' . $hero['background']);
        }

        $this->heroModel->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');

        return redirect()->to('/hero');
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'button' => 'required'
            //'background' => 'required'
        ], [
            'background' => [
                'rules' => 'max_size[background,8192]|is_image[background]|mime_in[background,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'broo, backgrounds file size is too big!',
                    'is_image' => 'Choose only image format broo!',
                    'mime_in' => 'Choose only image format broo!'
                ]
            ]
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/hero')->withInput();
        }

        $fileBackground = $this->request->getFile('background');
        //$nameBackground = "";

        if ($fileBackground->getError() == 4) {
            $nameBackground = $this->request->getVar('oldBackground');;
        } else {
            $fileBackground->move('img');
            $nameBackground = $fileBackground->getName();

            unlink('img/' .  $this->request->getVar('oldBackground'));
        }

        $this->heroModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'button' => $this->request->getVar('button'),
            'background' =>  $nameBackground
        ]);

        session()->setFlashdata('update', 'Data berhasil Diupdate.');

        return redirect()->to('/hero');
    }
}
