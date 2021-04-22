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
                "image" => null,
            ],
            [
                "name" => "Простые блюда",
                "slug" => "SimplyDishes",
                "image" => null,
            ],
            [
                "name" => "Блюда за 30 минут",
                "slug" => "30Minutes",
                "image" => null
            ],
            [
                "name" => "Рубрика 213",
                "slug" => "213",
                "image" => null
            ],
            [
                "name" => "Рубрика 555",
                "slug" => "555",
                "image" => null
            ],
            [
                "name" => "Прочее",
                "slug" => "Other",
                "image" => null
            ],
        ];

        DB::table('rubrics')->insert($rubrics);
    }
}
