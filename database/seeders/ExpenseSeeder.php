<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Expense;
use DB;

class ExpenseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'description' => 'DigitalOcean',
            'amount' => 6,
            'date' => new Carbon('2022-04-01'),
        ]);
        DB::table('expenses')->insert([
            'description' => 'DigitalOcean',
            'amount' => 6,
            'date' => new Carbon('2022-05-01'),
        ]);
        DB::table('expenses')->insert([
            'description' => 'DigitalOcean',
            'amount' => 6,
            'date' => new Carbon('2022-06-01'),
        ]);
        DB::table('expenses')->insert([
            'description' => 'GoDaddy - Fordsdevelopment.co.uk',
            'amount' => 25.18,
            'date' => new Carbon('2022-06-29'),
        ]);
        DB::table('expenses')->insert([
            'description' => 'DigitalOcean',
            'amount' => 6,
            'date' => new Carbon('2022-07-01'),
        ]);
        DB::table('expenses')->insert([
            'description' => 'DigitalOcean',
            'amount' => 7.20,
            'date' => new Carbon('2022-08-01'),
        ]);
        DB::table('expenses')->insert([
            'description' => 'Grammarly',
            'amount' => 20,
            'date' => new Carbon('2022-09-05'),
        ]);
        DB::table('expenses')->insert([
            'description' => 'Github Copilot',
            'amount' => 20,
            'date' => new Carbon('2022-09-05'),
        ]);
    }
}
