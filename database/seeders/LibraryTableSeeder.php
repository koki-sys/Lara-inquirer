<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DBInsert('libraries', '久留米市立中央図書館');
        DBInsert('libraries', '鳥栖市立図書館');
        DBInsert('libraries', 'みやき町立図書館');
        DBInsert('libraries', '福岡市立中央図書館');
        DBInsert('libraries', '土佐町立図書館');
        DBInsert('libraries', '三島図書館');
        DBInsert('libraries', '須崎市立図書館');
        DBInsert('libraries', '島根県立図書館');
        DBInsert('libraries', '広島市まんが図書館');
        DBInsert('libraries', '岡山県立図書館');
        DBInsert('libraries', '国立国会図書館');
        DBInsert('libraries', '京都府立図書館');
        DBInsert('libraries', '池田市立図書館');
        DBInsert('libraries', '金沢海みらい図書館');
        DBInsert('libraries', '愛知県図書館');
        DBInsert('libraries', '富山市立図書館');
        DBInsert('libraries', '海老名市立中央図書館');
        DBInsert('libraries', '江東区立江東図書館');
        DBInsert('libraries', '小山市立中央図書館');
        DBInsert('libraries', '青森県立図書館');
        DBInsert('libraries', '五戸町図書館');
        DBInsert('libraries', '岩手県立図書館');
        DBInsert('libraries', '北海道立図書館');
        DBInsert('libraries', '札幌市中央図書館');
        DBInsert('libraries', '釧路市中央図書館');
    }
}
