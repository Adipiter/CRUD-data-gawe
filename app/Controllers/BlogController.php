<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class BlogController extends BaseController
{
    public function index()
    {
        $model = new BlogModel();
        $data['blogs'] = $model->findAll();
        var_dump($data);
        return view('blog', $data);
    }

    public function blogdetail($slug)
    {
        $model = new BlogModel();

        // Ubah 'slug' menjadi kolom yang sesuai dengan judul Anda
        $data['isinya'] = $model->where('slug', $slug)->first();

        if (empty($data['isinya'])) {
            // Handle jika posting tidak ditemukan
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Posting tidak ditemukan.');
        }
        return view('blogtampil', $data);
    }
}
