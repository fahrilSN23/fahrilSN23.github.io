<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_user' => 'Fahril S. Nur',
                'email_user' => 'fahrilsn@mail.com',
                'password_user' => password_hash('fahrilsn', PASSWORD_BCRYPT),
                'level_user' => 'Administrator',
            ],
            [
                'nama_user' => 'Syarif Algar',
                'email_user' => 'syarifdeh@mail.com',
                'password_user' => password_hash('syarifdeh', PASSWORD_BCRYPT),
                'level_user' => 'Operator',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
