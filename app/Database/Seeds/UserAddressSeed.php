<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserAddressSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'address_line1'    => 'jl. abc no 45',
                'address_line2'    => 'jl. bcd no 21',
                'country'    => 'Indonesia',
                'province'    => 'Jawa Barat',
                'city'    => 'Cirebon',
                'district'    => 'Abcdefg',
                'village'    => 'Abcdefg',
                'postal_code'    => '98272',
                'telephone'    => '0812334343',
            ],
            [
                'user_id' => '2',
                'address_line1'    => 'jl. sds no 40',
                'address_line2'    => '',
                'country'    => 'Indonesia',
                'province'    => 'Abcdefg',
                'city'    => 'Abcdefg',
                'district'    => 'Abcdefg',
                'village'    => 'Abcdefg',
                'postal_code'    => '98232',
                'telephone'    => '082323242',
            ],
        ];

        // Using Query Builder
        $this->db->table('user_address')->insertBatch($data);
    }
}