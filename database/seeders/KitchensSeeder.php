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
            ],
            [
                "name" => "Итальянская кухня",
                "slug" => "italyKitchen"
            ],
            [
                "name" => "Грузинская кухня",
                "slug" => "georgianKitchen"
            ],
            [
                "name" => "Испанская кухня",
                "slug" => "spanishKitchen"
            ],
        ];

        DB::table('kitchens')->insert($kitchens);
    }
}
