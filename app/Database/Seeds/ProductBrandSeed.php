<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProductBrandSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'No Brand',
                'slug'    => 'no-brand',
                'created_at'    => Time::now(),
            ],
            [
                'name' => 'Erigo',
                'slug' => 'erigo',
                'created_at'    => Time::now(),
            ]
        ];

        $this->db->table('product_brand')->insertBatch($data);
    }
}
