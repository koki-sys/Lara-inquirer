<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DBInsert('categories', '日本の小説');
        DBInsert('categories', '歴史・伝統・地理');
        DBInsert('categories', '政治・法律・軍事');
        DBInsert('categories', '経済・統計');
        DBInsert('categories', '自然科学・医学');
        DBInsert('categories', '技術・工学・工業');
        DBInsert('categories', '家庭・家事・育児');
        DBInsert('categories', '芸術・スポーツ');
        DBInsert('categories', 'その他の一般書');
    }
}
