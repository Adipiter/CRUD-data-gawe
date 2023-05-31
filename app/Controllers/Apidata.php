<?php

namespace App\Controllers;
/** Untuk menerima data dari luar,
 * gunakan library bawaan CI4 ResponseTrait */
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

        return view('wibupage', $viewData);
    }

    public function getContents(){
        $api_url = 'https://dummy.restapiexample.com/api/v1/employees';

        // Bace JSON file
        $json = file_get_contents($api_url);
        
        // Decode JSON data kedalam array PHP
        $response = json_decode($json);
        
        // Semua data users yang ada di dalam object
        $user_data = $response->data;
        
        // Potong data panjang menjadi kecil & pilih hanya 10 rekaman pertama
        $user_data = array_slice($user_data, 0, 9);
        
        // Cetak data jika perlu men-debug 
        //print_r($user_data);
        
        // Lempar array dan tampilkan data pengguna
        foreach ($user_data as $user) {
            echo "name: ".$user->employee_name;
            echo "<br />";
            echo "age: ".$user->employee_age;
            echo "<br /> <br />";
        }
    }
}
