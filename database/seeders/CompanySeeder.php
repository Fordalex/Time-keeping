<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Expense;
use DB;

class CompanySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create companies
        DB::table('companies')->insert([
            'name' => 'Learning People',
            'first_line_address' => 'The Agora',
            'city' => 'Ellen Street',
            'country' => 'HOVE',
            'postcode' => 'BN3 3LN'
        ]);
        DB::table('companies')->insert([
            'name' => 'Commit Digital',
            'first_line_address' => 'something',
            'city' => 'something',
            'country' => 'UK',
            'postcode' => 'ddddd'
        ]);
    }
}

