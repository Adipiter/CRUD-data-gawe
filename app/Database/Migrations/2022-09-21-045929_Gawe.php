<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gawe extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gawe' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_gawe' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100
            ],
            'date_gawe' => [
                'type' => 'DATE',
            ],
            'buah' => [
                'type' => 'VARCHAR',
                'constraint'     => 100
            ],
            'info_gawe' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_gawe', true);
        $this->forge->createTable('gawe');    }

    public function down()
    {
        $this->forge->dropTable('gawe');
    }
}
