<?php

namespace Database\Seeders;

use App\Models\CourseMasterData;
use Illuminate\Database\Seeder;

class CourseMasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseMasterData::updateOrCreate([
            'name' => 'CSE201',
        ]);
        CourseMasterData::updateOrCreate([
            'name' => 'CSE202',
        ]);

        CourseMasterData::updateOrCreate([
            'name' => 'CSE203',
        ]);
        CourseMasterData::updateOrCreate([
            'name' => 'CSE204',
        ]);
        CourseMasterData::updateOrCreate([
            'name' => 'CSE205',
        ]);
        CourseMasterData::updateOrCreate([
            'name' => 'CSE206',
        ]);
        CourseMasterData::updateOrCreate([
            'name' => 'CSE207',
        ]);
    }
}
