<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::updateOrCreate([
            'name' => "Bachelor of Business Administration (BBA)",
        ]);

        Department::updateOrCreate([
            'name' => "Computer Science and Engineering (CSE)",
        ]);

        Department::updateOrCreate([
            'name' => "Government and Politics",
        ]);

        Department::updateOrCreate([
            'name' => "Sociology and Anthropology",
        ]);

        Department::updateOrCreate([
            'name' => "Economics",
        ]);

        Department::updateOrCreate([
            'name' => "English",
        ]);

        Department::updateOrCreate([
            'name' => "Bengali",
        ]);

        Department::updateOrCreate([
            'name' => "Islamic Studies",
        ]);

        Department::updateOrCreate([
            'name' => "Islamic History and Civilization",
        ]);

        Department::updateOrCreate([
            'name' => "Bachelor of Education (B.Ed.)",
        ]);

        Department::updateOrCreate([
            'name' => "Social Work",
        ]);

    }
}
