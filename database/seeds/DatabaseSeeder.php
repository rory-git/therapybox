<?php

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
        // $this->call(UserSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ClothingSeeder::class);
        $this->call(TodoSeeder::class);
        $this->call(MatchSeeder::class);
    }
}
