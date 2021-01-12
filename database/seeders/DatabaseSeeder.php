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

        // 本のデータを入れる関数
        function BookInsert($name, $author, $publisher, $isbn, $img, $library_id, $area_id, $category_id)
        {
            $param = [
                'name' => $name,
                'author' => $author,
                'publisher' => $publisher,
                'isbn' => $isbn,
                'img' => $img,
                'library_id' => $library_id,
                'area_id' => $area_id,
                'category_id' => $category_id
            ];
            DB::table('books')->insert($param);
        }

        $this->call(BookSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(LibraryTableSeeder::class);
    }
}
