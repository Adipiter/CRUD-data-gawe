<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AuthModel;
class Auth extends BaseController
{
    protected $model;

    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function register()
    {
        $rules = [
            'email' => ['rules' => 'required|min_length[6]|max_length[255]|valid_email|is_unique[users.email_user]'],
            'password' => ['rules' => 'required|min_length[4]|max_length[255]'],
            'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
        ];

        if($this->validate($rules)){
            $model = new AuthModel();
            $dataForm = [
                'email_user'    => $this->request->getVar('email'),
                'password_user' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($dataForm);
            return redirect()->to('auth/login');
        }else{
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

