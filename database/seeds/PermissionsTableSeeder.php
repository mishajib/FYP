<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'access dashboard', 'slug'=> Str::slug('access dashboard')]);
        Permission::create(['name' => 'access post', 'slug'=> Str::slug('access post')]);
        Permission::create(['name' => 'edit post', 'slug'=> Str::slug('edit post')]);
        Permission::create(['name' => 'delete post', 'slug'=> Str::slug('delete post')]);
        Permission::create(['name' => 'create post', 'slug'=> Str::slug('create post')]);
        Permission::create(['name' => 'publish post', 'slug'=> Str::slug('publish post')]);
        Permission::create(['name' => 'unpublish post', 'slug'=> Str::slug('unpublish post')]);
        Permission::create(['name' => 'active post', 'slug'=> Str::slug('active post')]);
        Permission::create(['name' => 'pending post', 'slug'=> Str::slug('pending post')]);
        Permission::create(['name' => 'access role', 'slug'=> Str::slug('access role')]);
        Permission::create(['name' => 'access user role', 'slug'=> Str::slug('access user role')]);
        Permission::create(['name' => 'create role', 'slug'=> Str::slug('create role')]);
        Permission::create(['name' => 'give user role', 'slug'=> Str::slug('give user role')]);
        Permission::create(['name' => 'edit user role', 'slug'=> Str::slug('edit user role')]);
        Permission::create(['name' => 'delete user role', 'slug'=> Str::slug('delete user role')]);
        Permission::create(['name' => 'edit role', 'slug'=> Str::slug('edit role')]);
        Permission::create(['name' => 'delete role', 'slug'=> Str::slug('delete role')]);
        Permission::create(['name' => 'access category', 'slug'=> Str::slug('access category')]);
        Permission::create(['name' => 'create category', 'slug'=> Str::slug('create category')]);
        Permission::create(['name' => 'edit category', 'slug'=> Str::slug('edit category')]);
        Permission::create(['name' => 'delete category', 'slug'=> Str::slug('delete category')]);
        Permission::create(['name' => 'access active category', 'slug'=> Str::slug('access active category')]);
        Permission::create(['name' => 'active category', 'slug'=> Str::slug('active category')]);
        Permission::create(['name' => 'deactive category', 'slug'=> Str::slug('deactive category')]);
        Permission::create(['name' => 'approved category', 'slug'=> Str::slug('approved category')]);
        Permission::create(['name' => 'pending category', 'slug'=> Str::slug('pending category')]);
        Permission::create(['name' => 'access pending category', 'slug'=> Str::slug('access pending category')]);
        Permission::create(['name' => 'access tag', 'slug'=> Str::slug('access tag')]);
        Permission::create(['name' => 'create tag', 'slug'=> Str::slug('create tag')]);
        Permission::create(['name' => 'edit tag', 'slug'=> Str::slug('edit tag')]);
        Permission::create(['name' => 'delete tag', 'slug'=> Str::slug('delete tag')]);
        Permission::create(['name' => 'access user', 'slug'=> Str::slug('access user')]);
        Permission::create(['name' => 'create user', 'slug'=> Str::slug('create user')]);
        Permission::create(['name' => 'edit user', 'slug'=> Str::slug('edit user')]);
        Permission::create(['name' => 'delete user', 'slug'=> Str::slug('delete user')]);
        Permission::create(['name' => 'admin user', 'slug'=> Str::slug('admin user')]);
        Permission::create(['name' => 'pending user', 'slug'=> Str::slug('pending user')]);
        Permission::create(['name' => 'approved user', 'slug'=> Str::slug('approved user')]);
        Permission::create(['name' => 'trash user', 'slug'=> Str::slug('trash user')]);
        Permission::create(['name' => 'restore user', 'slug'=> Str::slug('restore user')]);
        Permission::create(['name' => 'delete trash user', 'slug'=> Str::slug('delete trash user')]);
        Permission::create(['name' => 'access comment', 'slug'=> Str::slug('access comment')]);
        Permission::create(['name' => 'pending comment', 'slug'=> Str::slug('pending comment')]);
        Permission::create(['name' => 'access permission', 'slug'=> Str::slug('access permission')]);
        Permission::create(['name' => 'create permission', 'slug'=> Str::slug('create permission')]);
        Permission::create(['name' => 'edit permission', 'slug'=> Str::slug('edit permission')]);
        Permission::create(['name' => 'delete permission', 'slug'=> Str::slug('delete permission')]);
        Permission::create(['name' => 'access role permission', 'slug'=> Str::slug('access role permission')]);
        Permission::create(['name' => 'give role permission', 'slug'=> Str::slug('give role permission')]);
        Permission::create(['name' => 'edit role permission', 'slug'=> Str::slug('edit role permission')]);
        Permission::create(['name' => 'delete role permission', 'slug'=> Str::slug('delete role permission')]);
        Permission::create(['name' => 'access user permission', 'slug'=> Str::slug('access user permission')]);
        Permission::create(['name' => 'give user permission', 'slug'=> Str::slug('give user permission')]);
        Permission::create(['name' => 'edit user permission', 'slug'=> Str::slug('edit user permission')]);
        Permission::create(['name' => 'delete user permission', 'slug'=> Str::slug('delete user permission')]);
    }
}
