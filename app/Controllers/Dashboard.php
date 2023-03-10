<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AuthModel;

use App\Controllers\BaseController;
use App\Controllers\Auth;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();

        // Mengakses variabel session
        $userData = $session->get();

        // Mencetak nilai variabel menggunakan var_dump
        dd($userData);
    }
}
