<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Digiflazz extends BaseController
{
    public function ceksaldo(){
        $url = "https://api.digiflazz.com/v1/cek-saldo";
        $comand = "deposit";
        $username = "cazekoD7ELKg";
        $apikey = "a3bd1141-63f8-5885-9d9a-c52bbcf2c97b";
        $signature = md5($username . $apikey . "depo");

        $data = array(
            "cmd" => $comand,
            "username" => $username,
            "sign" => $signature
        );
        
        $headers = array(
            "Content-Type: application/json"
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $cekbalance = curl_exec($ch);
        curl_close($ch);
        
        var_dump($cekbalance);
    }

    public function daftarlayanan(){
        $url = "https://api.digiflazz.com/v1/price-list";
        $comand = "prepaid";
        $username = "xxxxxxxx";
        $apikey = "xxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxx";
        $signature = md5($username . $apikey . "pricelist");

        $data = array(
            "cmd" => $comand,
            "username" => $username,
            "sign" => $signature
        );
        
        $headers = array(
            "Content-Type: application/json"
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        $prettifiedResponse = json_encode(json_decode($response), JSON_PRETTY_PRINT);

        echo $prettifiedResponse;
    }

}
