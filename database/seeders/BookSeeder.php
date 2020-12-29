<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => Str::random(10),
            'author' => Str::random(10),
            'publisher' => Str::random(10),
            'isbn' => Str::random(10),
            'img' => 'img1.jpg',
            'library_id' => 1,
            'area_id' => 1,
            'category_id' => 1
        ]);
    }
}
