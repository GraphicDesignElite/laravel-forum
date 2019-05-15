<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = Role::where('name', 'superadmin')->first();
        $role_admin  = Role::where('name', 'admin')->first();
        $role_user  = Role::where('name', 'user')->first();

        $superadmin = new User();
        $superadmin->username = 'SuperAdmin';
        $superadmin->firstname = 'Garret';
        $superadmin->lastname = 'Bever';
        $superadmin->email = 'superadmin@gmail.com';
        $superadmin->password = bcrypt('kiramishi1');
        $superadmin->save(); 
        $superadmin->roles()->attach($role_superadmin);
        // Eventually allow super admin to promote admins
        $admin = new User();
        $admin->username = 'Admin';
        $admin->firstname = 'Garret';
        $admin->lastname = 'Bever';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('kiramishi1');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->username = 'User';
        $user->firstname = 'Garret';
        $user->lastname = 'Bever';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('kiramishi1');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
