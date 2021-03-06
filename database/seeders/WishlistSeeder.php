<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wishlist = [
            [
                'recipe_id' => 1,
                'user_id' => 2,
            ],
            [
                'recipe_id' => 2,
                'user_id' => 2,
            ],
            [
                'recipe_id' => 3,
                'user_id' => 2,
            ],
            [
                'recipe_id' => 4,
                'user_id' => 2,
            ],
            [
                'recipe_id' => 1,
                'user_id' => 3,
            ],
            [
                'recipe_id' => 5,
                'user_id' => 3,
            ]
        ];
            DB::table('wishlist')->insert($wishlist);
    }
}
