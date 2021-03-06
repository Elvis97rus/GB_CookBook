<?php

namespace Database\Seeders;

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
        $this->call(KitchensSeeder::class);
        $this->call(RubricsSeeder::class);
        $this->call(RecipesSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
