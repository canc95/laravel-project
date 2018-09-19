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
<<<<<<< HEAD
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
=======
>>>>>>> 73c5981f0dd9923eb1a3d3503714328039bb99da
        $this->call(PlansTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
