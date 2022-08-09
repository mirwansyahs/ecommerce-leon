<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserPayment extends Migration
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
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'payment_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'provider' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'account_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'expiry' => [
                'type'       => 'DATE',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_payment');
    }

    public function down()
    {
        $this->forge->dropTable('user_payment');
    }
}
