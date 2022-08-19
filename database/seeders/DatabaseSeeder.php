<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CleanSeeder::class,
            CompanySeeder::class,
            CommitDigitalSeeder::class,
            LearningPeopleSeeder::class,
            ExpenseSeeder::class,
        ]);
    }
}
