<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Joindata extends BaseController
{
    public function index()
    {
        //  Mendeklarasikan table mana yang akan di abstraksikan.
        $builder = $this->db->table('tablesatu');

        //  Melakukan join pada table kedua
        $builder->join('tabledua', 'tabledua.id_tbl_dua = tablesatu.hobi');

        //  Menangkap hasilnya dengan methode getResult
        $query = $builder->get()->getResult();
        dd($query);
        return view('jointable/join');
    }

    public function select()
    {
        //  Mendeklarasikan table mana yang akan di abstraksikan.
        $builder = $this->db->table('tablesatu');

        /*
            Pada cara yang ini kita melakukan "select" pada field di tablesatu.
            Kita dapat menyeleksi nya dengan format 'nama_table.namafield', gunakan tanda "."
            select pada kedua table.
        */
        $builder->select('tablesatu.id_tbl_satu, tablesatu.nama_orang, tablesatu.email, tabledua.nama_hobi');
        
        //  Melakukan join pada table satu dan dua
        $builder->join('tabledua', 'tabledua.id_tbl_dua = tablesatu.hobi');

        //  Menangkap hasilnya dengan methode getResult
        $query = $builder->get()->getResult();

        dd($query);
        return view('jointable/select');
    }
}