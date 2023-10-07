<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FotoProfile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'filename' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            // Jika Anda ingin menggunakan timestamps, Anda bisa menambahkan kolom created_at dan updated_at seperti ini:
            // 'created_at' => [
            //     'type' => 'DATETIME',
            //     'null' => true,
            // ],
            // 'updated_at' => [
            //     'type' => 'DATETIME',
            //     'null' => true,
            // ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profile');
    }

    public function down()
    {
        $this->forge->dropTable('profile');
    }
}
