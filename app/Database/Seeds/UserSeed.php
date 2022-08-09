<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'ali',
                'password'    => password_hash("12345", PASSWORD_DEFAULT),
                'image'    => 'avatar-1.png',
                'first_name'    => 'Ali',
                'last_name'    => 'Abdurohman',
                'telephone'    => '08123456789',
                'level'    => 'admin',
                'level'    => 'offline',
                'created_at'    => Time::now(),
                'modified_at'    => Time::now(),
            ],
            [
                'username' => 'user',
                'password'    => password_hash("12345", PASSWORD_DEFAULT),
                'image'    => 'avatar-1.png',
                'first_name'    => 'User',
                'last_name'    => '',
                'telephone'    => '081233434392',
                'level'    => 'user',
                'level'    => 'offline',
                'created_at'    => Time::now(),
                'modified_at'    => Time::now(),
            ],
        ];

        // Using Query Builder
        // $this->db->table('user')->insert($data);
        $this->db->table('user')->insertBatch($data);
    }
}