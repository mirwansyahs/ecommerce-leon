<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Message extends Migration
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
            'sender_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'recipient_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'message' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'is_read' => [
                'type'       => 'INT',
                'constraint' => '1',
                'default'    => '0',
            ],
            'time' => [
                'type'       => 'TIMESTAMP',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('sender_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('recipient_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('message');
    }

    public function down()
    {
        $this->forge->dropTable('message');
    }
}
