<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
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
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'desc' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'brand_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'size' => [
                'type'           => 'VARCHAR',
                'constraint'     => 11,
            ],
            'color' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'material' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'quantity' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'discount_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => true,
            ],
            'original_price' => [
                'type'           => 'DECIMAL',
                'constraint'     => 11,
            ],
            'price' => [
                'type'           => 'DECIMAL',
                'constraint'     => 11,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'modified_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'product_category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('brand_id', 'product_brand', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('discount_id', 'discount', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
