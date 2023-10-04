<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

class Upload extends BaseController
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
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return view('upload-form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();
            
            // Set flash message
            $this->session->setFlashdata('success_message', 'File berhasil diunggah.');

            return redirect()->to('upload');
        }

        $data = ['errors' => ['The file has already been moved.']];
        return view('upload-form', $data);
    }

}