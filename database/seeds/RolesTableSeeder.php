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
        $user = Role::create(['name' => 'user', 'slug' => 'user']);
        $user->givePermissionTo([
            'access dashboard',
            'access post',
            'create post',
            'edit post',
            'delete post',
            'publish post',
            'unpublish post',
            'access category',
            'create category',
            'edit category',
            'access tag',
            'create tag',
            'edit tag',
            'access comment',
        ]);
    }
}
