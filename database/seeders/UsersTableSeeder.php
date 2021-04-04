<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $password = Hash::make('sora');
        UserInsert('soraisu', 'soraisu@example.com', $password);
    }
}
