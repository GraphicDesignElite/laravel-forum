<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'superadmin';
        $role_employee->description = 'Super admin has all privileges.';
        $role_employee->save();

        $role_employee = new Role();
        $role_employee->name = 'admin';
        $role_employee->description = 'Admins can moderate daily activity.';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'user';
        $role_manager->description = 'Standard site visitor role';
        $role_manager->save();
    }
}
