<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

class UploadController extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('upload-form', ['errors' => []]);
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,900]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];

        // Sesuaikan name yang ada di 'form-upload'
        $img = $this->request->getFile('userfile');

        /*  Versi #1
        if ($this->validate($validationRule)) {
            if (!$img->hasMoved()) {
                $destination = WRITEPATH . 'uploads/';
                $img->move($destination, $img->getRandomName());
                $this->session->setFlashdata('success_message', 'File berhasil diunggah.');
            } else {
                return view('upload-form', ['errors' => ['The file has already been moved.']]);
            }
        } else {
            return view('upload-form', ['errors' => $this->validator->getErrors()]);
        }
        return redirect()->to('upload');
        */

        /*  Versi #2*/
        if (!$this->validate($validationRule)) {
            return view('upload-form', ['errors' => $this->validator->getErrors()]);
        }
        if ($img->hasMoved()) {
            return view('upload-form', ['errors' => ['The file has already been moved.']]);
        }
        $destination = WRITEPATH . 'uploads/';
        $img->move($destination, $img->getRandomName());
        $this->session->setFlashdata('success_message', 'File berhasil diunggah.');
        return redirect()->back();
        

        /* // Versi #3
        if ($this->validate($validationRule)) {
            $newName = $img->getRandomName();
    
            if ($img->move('public', $newName)) {
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {

            return redirect()->back();
        }
        */
    }

    public function ListImages() {
        # Menampilkan file dari WRITEPATH tidak dapat berjalan, entah kenapa aku gak ngerti
        # Jadi ubah ke public saja, dan untuk uploadnya menyesuaikan saja
        // $uploadDirectory = WRITEPATH . 'uploads/';
        $uploadDirectory = 'public';
        $files = scandir($uploadDirectory);
    
        $imageFiles = array_filter($files, function($file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            return in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
        });

        $data['imageFiles'] = $imageFiles;

        return view('imageTampil', $data);
    }

    public function uploadtodb()
    {
        // Lakukan validasi seperti yang telah Anda lakukan sebelumnya
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];

        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            // Simpan informasi gambar ke database
            $filename = $img->getName();
            $description = $this->request->getPost('description'); // Deskripsi gambar (jika ada)

            // Simpan informasi ke database (gunakan model atau Query Builder)
            $data = [
                'filename' => $filename,
                'description' => $description,
                'uploaded_at' => date('Y-m-d H:i:s')
            ];

            // Contoh penggunaan Query Builder
            $this->db->table('uploaded_images')->insert($data);

            // Lanjutkan dengan memindahkan file ke direktori 'uploads'
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            return view('upload_success', $data);
        }

        $data = ['errors' => ['The file has already been moved.']];

        return view('upload_form', $data);
    }

    // Tampilkan daftar gambar dari database
    public function listImagesdb()
    {
        // Ambil data gambar dari database (gunakan model atau Query Builder)
        $images = $this->db->table('uploaded_images')->get()->getResult();

        $data['images'] = $images;

        return view('image_list', $data);
    }
}