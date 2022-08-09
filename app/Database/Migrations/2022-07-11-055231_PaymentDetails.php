<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentDetails extends Migration
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
            'amount' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'provider' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
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
        $this->forge->createTable('payment_details');
    }

    public function down()
    {
        $this->forge->dropTable('payment_details');
    }
}
