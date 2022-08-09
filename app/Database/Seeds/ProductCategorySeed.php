<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProductCategorySeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name' => 'Baju',
                'category_slug'    => 'baju',
                'category_desc'    => 'Baju-baju bagus',
                'created_at'    => Time::now(),
            ],
            [
                'category_name' => 'Celana',
                'category_slug' => 'celana',
                'category_desc'    => 'Celana-celana bagus',
                'created_at'    => Time::now(),
            ]
        ];

        $this->db->table('product_category')->insertBatch($data);
    }
}
