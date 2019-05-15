<?php

use Illuminate\Database\Seeder;
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
        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo('user-password');
        $student->givePermissionTo('user-email');

        $teacher = Role::create(['name' => 'teacher']);
        $teacher->givePermissionTo('user-edit');
        $teacher->givePermissionTo('user-password');
        $teacher->givePermissionTo('user-email');

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('user-edit');
        $admin->givePermissionTo('user-password');
        $admin->givePermissionTo('user-email');
        $admin->givePermissionTo('schedule-update');
        $admin->givePermissionTo('substitution-schedule-update');
        $admin->givePermissionTo('user-administrate');
    }
}
