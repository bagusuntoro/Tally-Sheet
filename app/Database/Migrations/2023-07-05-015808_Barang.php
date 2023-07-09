<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'jenis_barang' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
          ]);
          $this->forge->addKey('id', TRUE);
          $this->forge->createTable('barangs');
    }

    public function down()
    {
        $this->forge->dropTable('barangs');
    }
}
