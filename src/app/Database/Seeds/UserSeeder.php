<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => password_hash('secret', PASSWORD_DEFAULT),
            ],
            [
                'name' => 'Thamires Andrade',
                'email' => 'thamires@admin.com',
                'password' => password_hash('secret', PASSWORD_DEFAULT),
            ],
            [
                'name' => 'Soft Desing',
                'email' => 'soft@admin.com',
                'password' => password_hash('secret', PASSWORD_DEFAULT),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
