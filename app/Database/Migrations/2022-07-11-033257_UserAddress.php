<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAddress extends Migration
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
            'address_line1' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'address_line2' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'country' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'province' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'district' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'village' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'postal_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'telephone' => [
                'type'       => 'VARCHAR',
                'constraint' => '13',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_address');
    }

    public function down()
    {
        $this->forge->dropTable('user_address');
    }
}
