<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert default value into roles table
        $role = Role::create(['name' => 'super', 'slug' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        Role::create(['name' => 'admin', 'slug' => 'admin']);
        Role::create(['name' => 'user', 'slug' => 'user']);
        Role::create(['name' => 'subscriber', 'slug' => 'subscriber']);
    }
}
