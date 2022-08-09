<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DiscountSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'discount_name'       => 'Tidak Ada',
                'discount_desc'       => '',
                'discount_percent'    => '0',
                'active'              => 'failed',
                'created_at'          => Time::now(),
            ],
            [
                'discount_name'       => 'Diskon Lebaran',
                'discount_desc'       => 'Diskon lebaran',
                'discount_percent'    => '50',
                'active'              => 'failed',
                'created_at'          => Time::now(),
            ],
            [
                'discount_name'       => 'Diskon Hari Merdeka',
                'discount_desc'       => 'Diskon Hari Merdeka',
                'discount_percent'    => '25',
                'active'              => 'active',
                'created_at'          => Time::now(),
            ]
        ];

        $this->db->table('discount')->insertBatch($data);
    }
}
