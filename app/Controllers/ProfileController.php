<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class ProfileController extends Controller
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        return view('profile_form');
    }

    public function profileUpload()
    {
        $fotoProfile = $this->request->getFile('foto');
    
        if ($fotoProfile && $fotoProfile->isValid() && $fotoProfile->getExtension() == 'png') {
            // Tentukan direktori tempat menyimpan foto profil
            $uploadPath = ROOTPATH . 'public/logo/';
    
            // Pastikan direktori public/logo ada, jika tidak, buat direktori tersebut
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
    
            // Generate nama unik untuk file foto profil
            $fileName = $fotoProfile->getRandomName();
    
            // Pindahkan file foto profil ke direktori yang ditentukan
            $fotoProfile->move($uploadPath, $fileName);
    
            // Simpan nama file foto profil ke database atau sesuai kebutuhan
            $this->profileModel->insert(['filename' => $fileName]); // Ganti 'ProfileModel' dengan model yang sesuai
    
            return redirect()->to('profile')->with('success', 'Foto profil berhasil diunggah');
        } else {
            return redirect()->to('profile')->with('error', 'Upload foto profil gagal. Pastikan file berformat PNG.');
        }
    }
}
