<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tablesatu extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_orang'    => 'Reno',
                'email'         => 'reno@gmail.com',
                'hobi'          => '1',
            ],
            [
                'nama_orang'    => 'Tono',
                'email'         => 'tono@gmail.com',
                'hobi'          => '2',
            ],

        ];

        // Simple Query
        $this->db->table('tablesatu')->insertBatch($data);
    }
}
