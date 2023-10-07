<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class ProfileController extends Controller
{
    protected $profileModel;

    public function index()
    {
        $builder = new ProfileModel();
        $query = $builder->select('filename')->first();
        
        // Ubah hasil menjadi array
        $data['filename'] = $query;
        
        // Kirim data ke tampilan 'profile_form'
        return view('profile_form', $data);
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
            // $fileName = $fotoProfile->getRandomName();

            // Tidak mengubah nama filenya
            $fileName = $fotoProfile->getName();

            // Pindahkan file foto profil ke direktori yang ditentukan
            $fotoProfile->move($uploadPath, $fileName);

            // Instansiasi Model
            $ProfileModel = new ProfileModel();

            // kolom ID yang akan Anda ubah (misalnya, ID 1)
            $modifikasi = 1;

            // Cek apakah profil sudah ada untuk ID yang ditentukan
            $profileAda = $ProfileModel->where('id', $modifikasi)->first();

            // Kondisi jika profile ada
            if ($profileAda) {
                // Ambil nama file yang akan dihapus
                $namaLama = $profileAda['filename'];

                // Hapus file lama sebelum menyimpan yang baru
                unlink(ROOTPATH . 'public/logo/' . $namaLama);

                // Jika profil sudah ada, perbarui data profilnya
                $ProfileModel->update($profileAda['id'], ['filename' => $fileName]);
            } else {
                // Jika tidak ada profil, buat profil baru untuk ID yang ditentukan
                $ProfileModel->insert(['filename' => $fileName]);
            }

            return redirect()->to('profile')->with('success', 'Foto profil berhasil diunggah');
        } else {
            return redirect()->to('profile')->with('error', 'Upload foto profil gagal. Pastikan file berformat PNG.');
        }
    }
}
