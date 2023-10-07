<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Files\UploadedFile;
use App\Models\DoUploadModel;

class DoUpload extends BaseController
{
    public function index()
    {
        return view('do_upload');
    }

    public function do_upload()
    {
        // Validasi input
        if (empty($_FILES['userfile']['name'])) {
            $error = ['error' => 'Pilih file yang akan diunggah.'];
            return view('do_upload', $error);
        }
    
        $config['upload_path']   = './public/uploads/'; // Ubah ke folder public/uploads
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
    
        // Menggunakan path sementara dari $_FILES
        $tempPath = $_FILES['userfile']['tmp_name'];
        $upload = new UploadedFile($tempPath, $_FILES['userfile']['name']);
    
        if (!$upload->isValid()) {
            $error = ['error' => $upload->getErrorString()];
            return view('do_upload', $error);
        }
    
        // Mengganti 'move' dengan 'store' untuk memindahkan file ke folder yang ditentukan
        $newFileName = $upload->getRandomName();
        $upload->store($config['upload_path'], $newFileName);
    
        // File berhasil diunggah, simpan informasi file ke database
        $fileModel = new \App\Models\UploadedFilesModel(); // Gantilah dengan nama model yang sesuai
        $fileData = [
            'file_name' => $newFileName, // Menggunakan nama file yang baru
            'file_path' => $config['upload_path'] . $newFileName, // Lokasi file yang diunggah
            'file_type' => $upload->getClientMimeType(),
            'file_size' => $upload->getSize(),
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        $fileModel->insert($fileData);
    
        // Tampilkan pesan sukses
        $data = ['upload_data' => $newFileName];
        return view('upload_success', $data);
    }
}
