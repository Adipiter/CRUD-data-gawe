<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Joindata extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('tablesatu');
        $builder->join('tabledua', 'tabledua.id = tablesatu.hobi');
        $hasil = $builder->get()->getResult();
        dd($hasil);
        return view('jointable/join');
    }
}