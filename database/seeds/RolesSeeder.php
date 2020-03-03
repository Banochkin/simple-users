<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view users']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('view users');

        $roleClient = Role::create(['name' => 'client']);

        $user = Factory(App\User::class)->create([
            'name' => 'admin',
            'email' => 'ruslan@banochkin.com',
            'password' => Hash::make('123123123')
        ]);
        $user->assignRole($roleAdmin);

        $user = Factory(App\User::class)->create([
            'name' => 'tester 1',
            'email' => 'yo@sk8er.name',
            'password' => Hash::make('123123123')
        ]);
        $user->assignRole($roleClient);

        $user = Factory(App\User::class)->create([
            'name' => 'tester 2',
            'email' => 'sk8er72t@gmail.com',
            'password' => Hash::make('123123123')
        ]);
        $user->assignRole($roleClient);
    }
}
