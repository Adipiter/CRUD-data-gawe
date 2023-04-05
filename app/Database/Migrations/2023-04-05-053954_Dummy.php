<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dummy extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 255,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'data' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'contacts' => [
                'type'  => 'VARCHAR',
                'constraint'  => 100,
            ],
            'another info' => [
                'type'  => 'TEXT',
                'null'  => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dummy');
    }

    public function down()
    {
        $this->forge->dropTable('dummy');
    }
}
