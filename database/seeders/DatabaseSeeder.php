<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsDemoSeeder::class,
            UserSeeder::class,
            PostSeeder::class
            // CategorySeeder::class,
            // TagSeeder::class,
        ]);
    }
}
