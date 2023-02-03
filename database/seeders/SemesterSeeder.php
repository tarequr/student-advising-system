<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::updateOrCreate([
            'currentSemester' => 'Spring2022',
        ]);

        Semester::updateOrCreate([
            'currentSemester' => 'Fall2022',
        ]);

        Semester::updateOrCreate([
            'currentSemester' => 'Spring2023',
        ]);

        Semester::updateOrCreate([
            'currentSemester' => 'Fall2023',
        ]);
   }
}
