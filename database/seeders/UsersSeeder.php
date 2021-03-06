<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.ru',
            'password' => Hash::make('user'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()
            ->count(6)
            ->create();
    }
}
