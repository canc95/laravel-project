<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;
use App\Models\Permission;

class AssignRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $usuarios = User::all();

      $usuarios[0]->assignRole('Administrator');
      for ($i=1; $i < 30 ; $i++) {
        $usuarios[$i]->assignRole('Escort');
      }
      for ($j=31; $j < 51 ; $j++) {
        $usuarios[$j]->assignRole('Guest');
      }
    }
}
