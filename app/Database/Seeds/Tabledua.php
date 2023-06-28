<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tabledua extends Seeder
{
    public function run()
    {
        $data = [
            // Isikan semua datanya
            [
                'nama_hobi'         => 'Mukulin orang',
                'makanan_favorite'  => 'Nasi goreng',
                'warna_favorite'    => 'Biru',
                'barang_pesanan'    => 'Sapu',
            ],
            [
                'nama_hobi'         => 'Mancing perkara',
                'makanan_favorite'  => 'Bakmi',
                'warna_favorite'    => 'Merah',
                'barang_pesanan'    => 'Obor',
            ],
            [
                'nama_hobi'         => 'Gibah',
                'makanan_favorite'  => 'Somay',
                'warna_favorite'    => 'Ungu',
                'barang_pesanan'    => 'Tongkat besi',
            ],
            [
                'nama_hobi'         => 'Fitnah',
                'makanan_favorite'  => 'Nasi goreng',
                'warna_favorite'    => 'Abu abu',
                'barang_pesanan'    => 'Gunting rumput',
            ],
            [
                'nama_hobi'         => 'Membunuh',
                'makanan_favorite'  => 'Spagheti',
                'warna_favorite'    => 'Hijau',
                'barang_pesanan'    => 'Traktor',
            ],

        ];

        // Simple Query
        $this->db->table('tabledua')->insertBatch($data);
    }
}
