<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // 地域名,カテゴリ名のデータを入れる関数
        function DBInsert($table, $name)
        {
            $param = [
                'name' => $name
            ];
            DB::table($table)->insert($param);
        }

        $this->call(BookSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
