<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SettingSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'LEON.ID',
                'image'    => 'LEON.ID.png',
                'email'    => 'official@leon.id',
                'telephone'    => '0812334343',
                'address'    => 'Jl. Abcd No. 41',
                'created_at'    => Time::now(),
                'modified_at'    => Time::now(),
            ]
        ];

        $this->db->table('store')->insertBatch($data);
    }
}