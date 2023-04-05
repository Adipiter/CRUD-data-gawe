<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DummyModel;

class Dummydata extends BaseController
{   
    #Di bawah ini terdapat macam macam cara pengambilan data dari database
    #Untuk contoh lebih banyak bisa buka di file "pengambilan data"

    #   find()
    #   mengambil baris data dengan primary key = 1
    public function find(){
        $model = new DummyModel();
        $data = $model->findAll();
    }

    #   where()
    #   mengambil semua baris data dengan field1 = 'value1'
    public function where(){
        $model = new DummyModel();
        $data = $model->where('field1', 'value1')->findAll(); 
    }

    #   select()
    #   mengambil data dari kolom field1 dan field2 saja
    public function select(){
        $model = new DummyModel();
        $model->select('email, contacts');
        $data = $model->findAll();
    }
}
