<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DBInsert('areas', '北海道');
        DBInsert('areas', '東北');
        DBInsert('areas', '関東');
        DBInsert('areas', '中部');
        DBInsert('areas', '近畿');
        DBInsert('areas', '中国');
        DBInsert('areas', '四国');
        DBInsert('areas', '九州・沖縄');
    }
}
