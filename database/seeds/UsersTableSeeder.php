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

      DB::table('users')->insert([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'admin@gmail.com',
        'status' => '1',
        'password' => bcrypt('secret'),
      ]);

      factory(App\User::class, 50)->create()->each(function ($u) {
           $u->escorts()->save(factory(App\Models\Escort::class)->make());
       });
    }
}
