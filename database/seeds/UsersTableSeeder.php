<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 20)->create()->each(function ($u) {
           $u->escorts()->save(factory(App\Models\Escort::class)->make());
       });
    }
}
