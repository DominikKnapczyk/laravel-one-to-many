<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technology = new Technology;
        $technology->name = 'Ruby';
        $technology->description = 'Back-End';
        $technology->created_at = now();
        $technology->updated_at = now();
        $technology->save();
    }
}
