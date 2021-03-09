<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // name, email, password
        UserInsert('soraisu', 'soraisu@example.com', 'sora');
    }
}
