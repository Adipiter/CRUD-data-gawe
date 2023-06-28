<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tabledua extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tbl_dua' => [
                'type'           => 'INT',
                'constraint'     => 100,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_hobi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'makanan_favorite' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'warna_favorite' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'barang_pesanan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_tbl_dua', true);
        $this->forge->createTable('tabledua');
    }

    public function down()
    {
        $this->forge->dropTable('tabledua');
    }
}
