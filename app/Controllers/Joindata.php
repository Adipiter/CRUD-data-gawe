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

    public function select()
    {
        $builder = $this->db->table('tablesatu');
        $builder->select('tablesatu.id_usr, tablesatu.nama_orang, tablesatu.email, tabledua.nama_hobi');
        $builder->join('tabledua', 'tabledua.id = tablesatu.hobi');
        $data = $builder->get()->getResult();

        dd($data);
        return view('jointable/select');
    }
}