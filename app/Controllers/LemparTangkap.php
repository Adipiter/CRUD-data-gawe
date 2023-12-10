<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LemparTangkap extends BaseController
{
    // Membuat fungsi lalu me return veriable agar di olah di fungsi yang membutuhkan
    public function lempardata(){
        $data = array(
            ["Nama" => "Adit", "Kelas" => "10"],
            ["Nama" => "Rosi", "Kelas" => "7"],
            ["Nama" => "Anabel", "Kelas" => "12"],
            ["Nama" => "Niko", "Kelas" => "8"]
        );

        return $data;
    }

    public function index()
    {
        $tangkap = $this->lempardata();
        
        foreach($tangkap as $tankp){
            /*
            merender array pake [], kalo datanya object pake arraw function

            Contoh merender object:
            $variable->namaKunci;
            */
            echo $tankp['Nama'];
        };
        return view('lempar-tangkap/index');
    }
}
