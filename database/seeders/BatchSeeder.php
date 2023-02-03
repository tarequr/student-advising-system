<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Batch::updateOrCreate([
            'name' => 1,
        ]);

        Batch::updateOrCreate([
            'name' => 2,
        ]);

        Batch::updateOrCreate([
            'name' => 3,
        ]);

        Batch::updateOrCreate([
            'name' => 4,
        ]);

        Batch::updateOrCreate([
            'name' => 5,
        ]);

        Batch::updateOrCreate([
            'name' => 6,
        ]);

        Batch::updateOrCreate([
            'name' => 7,
        ]);

        Batch::updateOrCreate([
            'name' => 8,
        ]);

        Batch::updateOrCreate([
            'name' => 9,
        ]);

        Batch::updateOrCreate([
            'name' => 10,
        ]);

    }
}
