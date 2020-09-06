<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert default value into users table
        $admin = User::create([
                                  'username'     => 'super-admin',
                                  'name'         => 'Super Admin',
                                  'slug'         => 'super-admin',
                                  'email'        => 'superadmin@admin.com',
                                  'phone_number' => '01303040637',
                                  'password'     => bcrypt('superadmin'),
                                  'client_ip'    => Request::ip(),
                                  'machine_name' => gethostname(),
                              ]);
        $super = Role::findByName('super');
        $admin->assignRole($super);

        $user = User::create([
                                 'username'     => 'user',
                                 'name'         => 'General User',
                                 'slug'         => 'general-user',
                                 'email'        => 'user@user.com',
                                 'phone_number' => '12345678912',
                                 'password'     => bcrypt('user'),
                                 'client_ip'    => Request::ip(),
                                 'machine_name' => gethostname(),
                             ]);
        $role = Role::findByName('user');
        $user->assignRole($role);
    }
}
