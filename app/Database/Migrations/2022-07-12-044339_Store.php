<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Store extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'image' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'address' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'telephone' => [
                'type'           => 'VARCHAR',
                'constraint'     => 13,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'modified_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('store');
    }

    public function down()
    {
        $this->forge->dropTable('store');
    }
}
