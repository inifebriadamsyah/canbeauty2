<?php

namespace App\Controllers;

use App\Models\KontakModel;

class Kontak extends BaseController
{
    protected $kontakModel;
    public function __construct()
    {
        $this->kontakModel = new KontakModel();
    }

    public function index()
    {
        session();
        if (session()->get('email') == '') {
            session()->setFlashdata('failed', 'Silakan Login terlebih dahulu!');
            return redirect()->to(base_url('users'));
        }
        $kontak = $this->kontakModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'kontak' => $kontak,
            'validation' => \Config\Services::validation()
        ];
        //dd($kontak);
        return view('admin/a_contact', $data);
    }

    public function getView()
    {
        $kontak = $this->kontakModel->findAll();
        $data = [
            'kontak' => $kontak
        ];
        //dd($kontak);
        echo view('main/p_contact', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'alamat' => 'required',
            'alamat_link' => 'required',
            'whatsapp' => 'required',
            'whatsapp_link' => 'required',
            'facebook' => 'required',
            'facebook_link' => 'required',
            'instagram' => 'required',
            'instagram_link' => 'required'
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/kontak')->withInput();
        }


        $this->ulasanModel->save([
            'id' => $id,
            'alamat' => $this->request->getVar('alamat'),
            'alamat_link' => $this->request->getVar('alamat_link'),
            'whatsapp' => $this->request->getVar('whatsapp'),
            'whatsapp_link' => $this->request->getVar('whatsapp_link'),
            'facebook' => $this->request->getVar('facebook'),
            'facebook_link' => $this->request->getVar('facebook_link'),
            'instagram' => $this->request->getVar('instagram'),
            'instagram_link' => $this->request->getVar('instagram_link')

        ]);

        session()->setFlashdata('update', 'Data berhasil Diupdate.');
        return redirect()->to('/kontak');
    }
}
