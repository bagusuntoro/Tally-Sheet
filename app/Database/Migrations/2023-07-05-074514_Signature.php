<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Signature extends Migration
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
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'signature'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('signatures');
    }

    public function down()
    {
        $this->forge->dropTable('signatures');
    }
}
