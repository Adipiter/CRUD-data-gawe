<?php

namespace App\Controllers;
/** Untuk menerima data dari luar,
 * gunakan libhrary bawaan CI4 ResponseTrait */
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Apidata extends BaseController{
    use ResponseTrait;
    public function terimadata()
    {
        /** Kita buat variable $url dan  mengisinya sebuah url,
         *  lalu kita dapatkan isinya dengan file_get_contents
         *  setelah datanya di tangkap, datanya masih berupa json 
         *  kita decode jsonnya menjadi array assosiatif agar
         *  dapat di consume oleh phpnya.
         */
        $url = 'https://vanyme-api.ryuzein.repl.co/nanime/anime/vinland-saga-season-2/';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        /** Data di atas perlu kita kirim ke tampilan agar tampil di browser */
        $viewData = ['datanya' => $data];
        var_dump($viewData);
        return view('wibupage', $viewData);
    }
}
