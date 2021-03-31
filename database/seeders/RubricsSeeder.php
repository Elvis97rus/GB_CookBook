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
            ],
            [
                "name" => "Блюда за 30 минут",
                "slug" => "30Minutes"
            ],
            [
                "name" => "Прочее",
                "slug" => "Other"
            ],
        ];

        DB::table('rubrics')->insert($rubrics);
    }
}
