<?php

namespace Database\Seeders;

use App\Models\KategoriBuku;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // KategoriBuku::factory(20)->create();
        User::insert([
                'id' => 1,
                'name' => 'Administrator',
                'username' => 'admin',
                'status_user' => 1,
                'password' => Hash::make('admin'),
            ]);
    }
}
