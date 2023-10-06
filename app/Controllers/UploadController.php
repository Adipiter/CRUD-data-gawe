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

        $img = $this->request->getFile('userfile');

        // Versi #1
        // if ($this->validate($validationRule)) {
        //     if (!$img->hasMoved()) {
        //         $destination = WRITEPATH . 'uploads/';
        //         $img->move($destination, $img->getRandomName());
        //         $this->session->setFlashdata('success_message', 'File berhasil diunggah.');
        //     } else {
        //         return view('upload-form', ['errors' => ['The file has already been moved.']]);
        //     }
        // } else {
        //     return view('upload-form', ['errors' => $this->validator->getErrors()]);
        // }
        // return redirect()->to('upload');

        // Versi #2
        if (!$this->validate($validationRule)) {
            return view('upload-form', ['errors' => $this->validator->getErrors()]);
        }
        if ($img->hasMoved()) {
            return view('upload-form', ['errors' => ['The file has already been moved.']]);
        }
        $destination = WRITEPATH . 'uploads/';
        $img->move($destination, $img->getRandomName());
        $this->session->setFlashdata('success_message', 'File berhasil diunggah.');
        
        return redirect()->to('upload');
    }
}