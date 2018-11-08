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

      $usuarios[0]->assignRole('Amministratore');
      for ($i=1; $i < 31 ; $i++) {
        $usuarios[$i]->assignRole('Escorta');
      }
      for ($j=31; $j < 51 ; $j++) {
        $usuarios[$j]->assignRole('Ospite');
      }
    }
}
