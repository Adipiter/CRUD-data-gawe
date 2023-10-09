<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'      => 'Ini post pertama',
                'slug'      => 'Ini-post-pertama',
                'konten'    => 'VR dan AR telah mengubah cara kita bermain, belajar, dan berinteraksi dengan dunia sekitar. Mereka memiliki potensi besar dalam pendidikan, hiburan, dan industri lainnya.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Ini post kedua',
                'slug'      => 'Ini-post-kedua',
                'konten'    => 'Olahraga membantu meningkatkan kekuatan otot, stamina, dan daya tahan fisik Anda. Dengan berolahraga secara teratur, Anda akan merasa lebih segar dan energik sepanjang hari.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Ini post ketiga',
                'slug'      => 'Ini-post-ketiga',
                'konten'    => 'Tidak ada batasan dalam sains fiksi. Penulis dapat menciptakan planet asing, perjalanan waktu, teknologi misterius, dan makhluk luar angkasa. Hal ini membuka pintu bagi kreativitas yang tak terbatas.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Ini post keempat',
                'slug'      => 'Ini-post-keempat',
                'konten'    => 'Sains fiksi sering mencerminkan masalah-masalah sosial kontemporer dan mengajak kita untuk memikirkannya lebih dalam.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Imajinasi Tanpa Batas',
                'slug'      => 'Imajinasi-tanpa-batas',
                'konten'    => 'Dunia sains fiksi adalah tempat di mana semua mungkin. Penulis dapat menciptakan planet asing, perjalanan waktu, dan teknologi canggih.',
                'created_at' => date('Y-m-d H:i:s'),
            ],

        ];
    
        // Masukkan data ke dalam tabel
        $this->db->table('myblog')->insertBatch($data);
    }
}
