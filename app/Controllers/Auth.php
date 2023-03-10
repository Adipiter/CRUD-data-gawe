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
            return redirect()->to('login'); // redirect ke 'auth/login' jika berhasil
        }else{
            // Jika gagal
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        }

        return view('auth/register', $data);
    }

    public function login(){
        return view('auth/login');
    }

    public function authenticate(){
        // Mendapatkan input dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Melakukan validasi pada input
        $validation = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[4]'
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembali ke halaman login dengan error
            session()->setFlashdata('error', 'Invalid email or password');
            return redirect()->to('login')->withInput();
        }

        // Mencari user dengan email yang diberikan
        $model = new AuthModel();
        $user = $model->where('email_user', $email)->first();

        if (!$user) {
            // Jika data validasi tidak ditemukan, kembali ke halaman login dengan error
            session()->setFlashdata('error', 'Invalid email or password');
            return redirect()->back()->withInput();
        }

        // Memeriksa apakah password yang diberikan sesuai dengan yang tersimpan di database
        if (!password_verify($password, $user['password_user'])) {
            // Jika password tidak sesuai, kembali ke halaman login dengan error
            session()->setFlashdata('error', 'Invalid email or password');
            return redirect()->back()->withInput();
        }

        // Jika user ditemukan dan password sesuai, buat session dan redirect ke halaman dashboard
        session()->set([
            'iduser' => $user['id_user'],
            'email' => $user['email_user'],
            'username' => $user['name_user'],
            'logged_in' => true
        ]);

        return redirect()->to('dashboard'); // ini redirect nya
    }

    // Hapus data session
    public function logout() {
        session()->remove([
            'iduser',
            'email',
            'username',
            'logged_in'
        ]);

        return redirect()->to('login');
    }

}

