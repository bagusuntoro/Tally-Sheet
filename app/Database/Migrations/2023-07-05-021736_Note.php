<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Note extends Migration
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
            'location' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'date' => [
                'type'           => 'Date',
            ],
            'no_container'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'no_seal'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'destination'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'no_truck'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'driver'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'telp'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'id_signature'      => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],

          ]);
          $this->forge->addKey('id', TRUE);
          $this->forge->createTable('notes');
          $this->forge->addForeignKey('id_signature', 'signatures', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('notes');
    }
}
