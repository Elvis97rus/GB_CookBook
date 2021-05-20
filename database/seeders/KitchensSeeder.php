<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KitchensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kitchens = [
            [
                "name" => "Русская кухня",
                "slug" => "rusKitchen",
                "img" => "rus"
            ],
            [
                "name" => "Итальянская кухня",
                "slug" => "italyKitchen",
                "img" => "ital"
            ],
            [
                "name" => "Грузинская кухня",
                "slug" => "georgianKitchen",
                "img" => "gruz"
            ],
            [
                "name" => "Испанская кухня",
                "slug" => "spanishKitchen",
                "img" => "span"
            ],
        ];

        DB::table('kitchens')->insert($kitchens);
    }
}
