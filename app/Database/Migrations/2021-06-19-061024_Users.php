<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id'          => [
        'type'           => 'INT',
        'constraint'     => 255,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'email'       => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'fullname' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'password_hash' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'birthday' => [
        'type'       => 'int',
        'constraint' => '255',
      ],
      'gender' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'role_id' => [
        'type'       => 'INT',
        'constraint' => 5,
      ],
      'is_active' => [
        'type'       => 'INT',
        'constraint' => 1,
      ],
      'created_at' => [
        'type'       => 'DATETIME',
        'null'       => TRUE,
      ],
      'updated_at' => [
        'type'       => 'DATETIME',
        'null'       => TRUE,
      ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('users');
  }

  public function down()
  {
    $this->forge->dropTable('users');
  }
}
