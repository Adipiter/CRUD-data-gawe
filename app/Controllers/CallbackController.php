<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class CallbackController extends BaseController
{
    public function index()
    {
        /* privatekey Tripay **/
        $privateKey = 'xxxx-xxxx-xxxx-xxxx-xxxxx';
        
        /* membaca seluruh data JSON yang diterima melalui input PHP dan menyimpannya dalam variabel $json. **/
        $json = file_get_contents('php://input');
        
        /* mengambil tanda tangan yang dikirim oleh payment gateway dari header HTTP HTTP_X_CALLBACK_SIGNATURE. **/
        $callbackSignature = $this->request->getServer('HTTP_X_CALLBACK_SIGNATURE');

        /*  Tanda tangan HMAC (Hash-based Message Authentication Code) dihasilkan menggunakan algoritma SHA-256
            dengan menggunakan data JSON yang diterima dan kunci rahasia sebagai kunci.
            Ini adalah langkah penting dalam verifikasi callback.
        **/
        $signature = hash_hmac('sha256', $json, $privateKey);

        /*  Pada blok ini, tanda tangan yang diterima dibandingkan dengan tanda tangan yang dihasilkan.
            Jika tanda tangan tidak cocok, maka respon dengan pesan "Invalid signature" dikirim ke gateway.
        **/
        if ($callbackSignature !== $signature) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid signature'
            ]);
        }

        // Data JSON yang diterima di-decode menjadi bentuk objek PHP.
        $data = json_decode($json);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid data sent by payment gateway'
            ]);
        }

        /*  Kode ini memeriksa jenis callback event yang diterima.
            Jika bukan 'payment_status', maka respon dengan pesan "Unrecognized callback event" dikirim.
        */
        if ('payment_status' !== $this->request->getServer('HTTP_X_CALLBACK_EVENT')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Unrecognized callback event: ' . $this->request->getServer('HTTP_X_CALLBACK_EVENT')
            ]);
        }

        // Kembalikan responnya ke payment gateway bahwa callback berhasil
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Callback received and processed successfully'
        ]);
    }
}
