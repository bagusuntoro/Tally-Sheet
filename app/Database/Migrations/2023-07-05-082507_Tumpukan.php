<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tumpukan extends Migration
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
            'tumpukan_1' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_2' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_3' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_4' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_5' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_6' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_7' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_8' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_9' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'tumpukan_10' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'total' => [
                'type'           => 'INT',
                'constraint'     => '11',
                'null' => TRUE,
            ],
            'id_note'      => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'id_barang'      => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
          ]);
          $this->forge->addKey('id', TRUE);
          $this->forge->createTable('tumpukans');
          $this->forge->addForeignKey('id_note', 'id_notes', 'id');
          $this->forge->addForeignKey('id_barang', 'barangs', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('tumpukans');
    }
}
