<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
          'Amministratore',
          'Escorta',
          'Ospite',
        ];

        $crud =[
          'Show', 'Index', 'Create', 'Edit', 'Delete',
        ];

        $models =[
          'Plan', 'Country', 'State', 'Escort', 'User',
        ];

        $permissions = [];

        foreach ($models as $model) {
          foreach ($crud as $type) {
            $permission = $type . ' ' . $model;
            array_push($permissions, $permission);
          }
        }

        foreach ($roles as $role) {
          $new_role = new Role();
          $new_role->public_name = $role;
          $new_role->name = strtolower(str_replace(' ', '-', $role));
          $new_role->guard_name = 'web';
          $new_role->save();
        }

        foreach ($permissions as $permission) {
          $new_permission = new Permission();
          $new_permission->public_name = $permission;
          $new_permission->name = strtolower(str_replace(' ', '-', $permission));
          $new_permission->guard_name = 'web';
          $new_permission->save();
        }

        //Admin Permissions
        $all_permission = Permission::all()->pluck('name')->toArray();
        $administrator = Role::where('name', 'Amministratore')->first();
        $administrator->givePermissionTo($all_permission);

        // //Escort Permissions
        $escort = Role::where('name', 'Escorta')->first();
        $escort->givePermissionTo('edit-escort', 'create-escort');
        //
        // //Guest Permissions
        $guest = Role::where('name', 'Ospite')->first();
        $guest->givePermissionTo('show-escort', 'create-escort');
    }
}
