<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $profileModel;
    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        session();
        if (session()->get('email') == '') {
            session()->setFlashdata('failed', 'Silakan Login terlebih dahulu!');
            return redirect()->to(base_url('users'));
        }
        $profile = $this->profileModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'profile' => $profile,
            'validation' => \Config\Services::validation()
        ];
        //dd($profile);
        echo view('admin/a_profile', $data);
    }

    public function getView()
    {
        $profile = $this->profileModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'profile' => $profile
        ];
        //dd($profile);
        echo view('main/p_profile', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'sub_title' => 'required',
            '2nd_desc' => 'required',
            '3nd_desc' => 'required'
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
            // return redirect()->to('/profile')->withInput()->with('validation', $validation);
            return redirect()->to('/profile')->withInput();
        }

        $fileimage = $this->request->getFile('image');

        if ($fileimage->getError() == 4) {
            $nameimage = 'slide3.jpeg';
        } else {
            $fileimage->move('img');
            $nameimage = $fileimage->getName();
        }

        $this->profileModel->save([
            'sub_title' => $this->request->getVar('sub_title'),
            '2nd_desc' => $this->request->getVar('2nd_desc'),
            '3nd_desc' => $this->request->getVar('3nd_desc'),
            'image' =>  $nameimage
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/profile');
    }

    public function delete($id)
    {
        $profile = $this->profileModel->find($id);

        if ($profile['image'] != 'slide3.jpeg') {
            unlink('img/' . $profile['image']);
        }

        $this->profileModel->delete($id);
        session()->setFlashdata('hapus', 'Data berhasil dihapus.');

        return redirect()->to('/profile');
    }

    public function update($id)
    {
        if (!$this->validate([
            'sub_title' => 'required',
            '2nd_desc' => 'required',
            '3nd_desc' => 'required'
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
            return redirect()->to('/profile')->withInput();
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

        $this->profileModel->save([
            'id' => $id,
            'sub_title' => $this->request->getVar('sub_title'),
            '2nd_desc' => $this->request->getVar('2nd_desc'),
            '3nd_desc' => $this->request->getVar('3nd_desc'),
            'image' =>  $nameimage
        ]);

        session()->setFlashdata('update', 'Data berhasil Diupdate.');

        return redirect()->to('/profile');
    }
}
