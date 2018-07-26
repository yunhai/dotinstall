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
        $this->call(MsCategoriesTableSeeder::class);
        $this->call(MsLanguagesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
