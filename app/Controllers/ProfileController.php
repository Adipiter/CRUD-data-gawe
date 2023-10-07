<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class ProfileController extends Controller
{
    protected $profileModel;

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
            $ProfileModel = new ProfileModel();

            // kolom ID yang akan Anda ubah (misalnya, ID 1)
            $userIdToModify = 1;

            // Instansiasi Model
            $ProfileModel = new ProfileModel();

            // Cek apakah profil sudah ada untuk ID yang ditentukan
            $profileAda = $ProfileModel->where('id', $userIdToModify)->first();

            if ($profileAda) {
                // Ambil nama file yang akan dihapus
                $oldFileName = $profileAda['filename'];

                // Hapus file lama sebelum menyimpan yang baru
                unlink(ROOTPATH . 'public/logo/' . $oldFileName);

                // Jika profil sudah ada, perbarui data profilnya
                $ProfileModel->update($profileAda['id'], ['filename' => $fileName]);
            } else {
                // Jika tidak ada profil, buat profil baru untuk ID yang ditentukan
                $ProfileModel->insert(['id' => $userIdToModify, 'filename' => $fileName]);
            }

            return redirect()->to('profile')->with('success', 'Foto profil berhasil diunggah');
        } else {
            return redirect()->to('profile')->with('error', 'Upload foto profil gagal. Pastikan file berformat PNG.');
        }
    }
}
