<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OptionSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'option' => 'Apel',
            ],
            [
                'option' => 'Jeruk',
            ],
            [
                'option' => 'Mangga',
            ],
        ];

        // Using Query Builder
        $this->db->table('option')->insertBatch($data);
    }
}
