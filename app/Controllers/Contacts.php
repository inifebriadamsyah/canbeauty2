<?php

namespace App\Controllers;

use App\Models\ContactsModel;

class Contacts extends BaseController
{
    protected $ContactsModel;
    public function __construct()
    {
        $this->contactsModel = new ContactsModel();
    }

    public function index()
    {
        $contacts = $this->ContactsModel->findAll();
        $data = [
            'title' => 'Admin Canbeauty.id',
            'contacts' => $contacts
        ];
        //dd($Contacts);
        echo view('admin/a_contacts', $data);
    }
}
