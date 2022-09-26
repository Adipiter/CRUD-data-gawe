<?php

namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\UserModel;
class Find extends BaseController
{
    public function index()
    {
        $users= new UserModel;

        $data = $users->getUsers();

        return view('find', compact('data'));
    }
}
