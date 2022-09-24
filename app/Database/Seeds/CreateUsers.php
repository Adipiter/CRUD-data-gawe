<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CreateUsers extends Seeder
{
    public function run()
    {
        $data = [
            'name_user' => 'Admininstrator',
            'email_user' => 'terkom@gmail.com',
            'password_user' => password_hash('12345', PASSWORD_BCRYPT),
        ];

        $this->db->table('users')->insert($data);
    }
}
