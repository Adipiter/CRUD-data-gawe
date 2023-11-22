<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Option extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'option' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('option');
    }

    public function down()
    {
        $this->forge->dropTable('option');
    }
}
