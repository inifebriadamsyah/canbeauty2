<?php

namespace App\Controllers;

use App\Models\FooterModel;

class Footer extends BaseController
{
    protected $footerModel;
    public function __construct()
    {
        $this->footerModel = new FooterModel();
    }

    public function index()
    {
        session();
        $footer = $this->footerModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'footer' => $footer,
            'validation' => \Config\Services::validation()
        ];
        //dd($Footer);
        echo view('admin/a_footer', $data);
    }

    public function getView()
    {
        $footer = $this->footerModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'footer' => $footer
        ];
        //dd($Footer);
        echo view('main/p_footer', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'footer_text' => 'required',
            'facebook' => 'required',
            'instagram' => 'required'
        ])) {
            //$validation = \Config\Services::validation();
            return redirect()->to('/kontak')->withInput();
        }


        $this->ulasanModel->save([
            'id' => $id,
            'footer_text' => $this->request->getVar('footer_text'),
            'facebook' => $this->request->getVar('facebook'),
            'instagram' => $this->request->getVar('instagram'),
        ]);

        session()->setFlashdata('update', 'Data berhasil Diupdate.');
        return redirect()->to('/kontak');
    }
}
