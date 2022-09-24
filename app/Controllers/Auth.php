<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index(){
    }

    public function login(){
        return view('auth/login');
    }

    public function loginprocess(){
        echo "Selamat login";
    }
}
