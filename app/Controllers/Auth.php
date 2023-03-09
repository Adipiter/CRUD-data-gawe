<?php

namespace App\Controllers;

// import Models dari models
use App\Models\UserModel;
use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $model;

    // Buat constructor dan muat helper form agar di jalankan lebih awal
    // Dibawah ini terdapat 2 object, sebenarnya cukup form saja dalam kasus ini.
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function register()
    {
        // Buat sebuah variable bernama rules untuk menerima aturan untuk form
        $rules = [
            'email' => ['rules' => 'required|min_length[6]|max_length[255]|valid_email|is_unique[users.email_user]'],
            'password' => ['rules' => 'required|min_length[4]|max_length[255]'],
            'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
        ];

        // Lakukan pengkondisian jika form yang di inputkan benar
        if($this->validate($rules)){
            $model = new AuthModel(); // Instansiasi AuthModel

            // Tankap data dari inputan
            $dataForm = [
                'email_user'    => $this->request->getVar('email'),
                'password_user' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($dataForm); // Save data dari hasil tangtkapan ke model
            return redirect()->to('auth/login'); // redirect ke 'auth/login' jika berhasil
        }else{
            // Jika gagal
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        }

        return view('auth/register', $data);
    }

    public function authenticate()
    {
        return view('auth/login');
    }
}

