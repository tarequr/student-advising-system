<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissions = Permission::all();

        Role::updateOrCreate([
            'name'      => 'Super Admin',
            'slug'      => 'super_admin',
            'deletable' => false
        ])->permissions()->sync($adminPermissions->pluck('id'));

        // $dashboardPermissions = Permission::where('slug','dashboard')->first();

        // $teacherRole = Role::updateOrCreate([
        //     'name'      => 'Teacher',
        //     'slug'      => 'teacher',
        //     'deletable' => false
        // ]);
        // $teacherRole->permissions()->updateOrCreate([
        //     'permission_id' => $dashboardPermissions->pluck('id'),
        //     'role_id'       => $teacherRole->id
        // ]);

        // Role::updateOrCreate([
        //     'name'      => 'User',
        //     'slug'      => 'user',
        //     'deletable' => false
        // ])->permissions()->sync($dashboardPermissions->pluck('id'));


        Role::updateOrCreate([
            'name'      => 'Teacher',
            'slug'      => 'teacher',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name'      => 'Student',
            'slug'      => 'student',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name'      => 'Co Admin',
            'slug'      => 'co_admin',
            'deletable' => false
        ]);
    }
}
