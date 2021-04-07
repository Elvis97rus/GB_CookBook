<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rubrics = [
            [
                "name" => "Горячие блюда",
                "slug" => "HotDishes",
                "image" => "2_1.png",
            ],
            [
                "name" => "Простые блюда",
                "slug" => "SimplyDishes",
                "image" => "2_1.png",
            ],
            [
                "name" => "Блюда за 30 минут",
                "slug" => "30Minutes",
                "image" => "2_2_1.png"
            ],
            [
                "name" => "Рубрика 213",
                "slug" => "213",
                "image" => "2_2_2.png"
            ],
            [
                "name" => "Рубрика 555",
                "slug" => "555",
                "image" => "2_2_1.png"
            ],
            [
                "name" => "Прочее",
                "slug" => "Other",
                "image" => "2_1.png"
            ],
        ];

        DB::table('rubrics')->insert($rubrics);
    }
}
