<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tablesatu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tbl_satu' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_orang' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true
            ],
            'hobi' => [
                'type'  => 'VARCHAR',
                'constraint' => 255,
                'null'  => true,
            ],
        ]);
        $this->forge->addKey('id_tbl_satu', true);
        $this->forge->createTable('tablesatu');
    }

    public function down()
    {
        $this->forge->dropTable('tablesatu');
    }
}