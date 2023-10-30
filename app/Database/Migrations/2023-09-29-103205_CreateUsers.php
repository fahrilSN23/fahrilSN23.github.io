<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'level_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
