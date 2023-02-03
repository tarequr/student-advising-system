<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ********* dashboard permission ************ */
        $moduleDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $moduleDashboard->id,
            'name'      => 'Access Dashboard',
            'slug'      => 'dashboard'
        ]);

        /* ********* role permission ************ */
        $moduleRole = Module::updateOrCreate(['name' => 'Role Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name'      => 'Access Role',
            'slug'      => 'roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name'      => 'Create Role',
            'slug'      => 'roles.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name'      => 'Edit Role',
            'slug'      => 'roles.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name'      => 'Delete Role',
            'slug'      => 'roles.destroy'
        ]);

        /* ********* user permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'User Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access User',
            'slug'      => 'users.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create User',
            'slug'      => 'users.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit User',
            'slug'      => 'users.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete User',
            'slug'      => 'users.destroy'
        ]);

        /* ********* department permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Department Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Department',
            'slug'      => 'departments.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Department',
            'slug'      => 'departments.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit Department',
            'slug'      => 'departments.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Department',
            'slug'      => 'departments.destroy'
        ]);

        /* ********* batchs permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Batch Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Batch',
            'slug'      => 'batchs.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Batch',
            'slug'      => 'batchs.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit Batch',
            'slug'      => 'batchs.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Batch',
            'slug'      => 'batchs.destroy'
        ]);

        /* ********* courses permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Course Offering Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Course',
            'slug'      => 'courses.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Course',
            'slug'      => 'courses.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit Course',
            'slug'      => 'courses.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Course',
            'slug'      => 'courses.destroy'
        ]);

        /* ********* semesters permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Semester Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Semester',
            'slug'      => 'semesters.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Semester',
            'slug'      => 'semesters.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit Semester',
            'slug'      => 'semesters.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Semester',
            'slug'      => 'semesters.destroy'
        ]);

        /* ********* advising permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Advising Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Advising',
            'slug'      => 'advised.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Advising',
            'slug'      => 'advised.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Edit Advising',
            'slug'      => 'advised.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Advising',
            'slug'      => 'advised.destroy'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Drop Course',
            'slug'      => 'student-list'
        ]);

        /* ********* mycourse permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'My Course Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access My Course',
            'slug'      => 'mycourse'
        ]);


        /* ********* routine permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Routine Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Routine',
            'slug'      => 'routines.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Create Routine',
            'slug'      => 'routines.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Download Routine',
            'slug'      => 'routines.show'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Delete Routine',
            'slug'      => 'routines.destroy'
        ]);

        /* ********* routine permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'previous Courses Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Previous Course',
            'slug'      => 'previousCourses.index'
        ]);


        /* ********* result permission ************ */
        $moduleUser = Module::updateOrCreate(['name' => 'Result Entry Managemant']);
        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Access Result',
            'slug'      => 'result.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'Result Update',
            'slug'      => 'result.store'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUser->id,
            'name'      => 'My Result ',
            'slug'      => 'my-resultstudent-list'
        ]);



    }
}
