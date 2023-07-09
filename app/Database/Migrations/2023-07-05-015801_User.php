<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
            'telp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'email'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'nik'     => [
                'type'           => 'BIGINT',
                'constraint'     => 17,
            ],
            'role'      => [
                'type'           => 'ENUM',
                'constraint'     => ['admin', 'user'],
                'default'        => 'user',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
          ]);
          $this->forge->addKey('id', TRUE);
          $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
