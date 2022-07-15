<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Company;
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
        // delete all
        DB::table('companies')->delete();
        DB::table('invoices')->delete();
        DB::table('billed_shifts')->delete();
        DB::table('shifts')->delete();

        // create companies
        DB::table('companies')->insert([
            'name' => 'Learning People',
            'first_line_address' => 'something',
            'city' => 'something',
            'country' => 'UK',
            'postcode' => 'ddddd'
        ]);
        DB::table('companies')->insert([
            'name' => 'Commit Digital',
            'first_line_address' => 'something',
            'city' => 'something',
            'country' => 'UK',
            'postcode' => 'ddddd'
        ]);

        $learning_people = Company::where('name', 'Learning People')->first();

        // create shifts
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 20.00,
            'date' => Carbon::today()->subDays(1),
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 120,
            'hourly_rate' => 20.00,
            'date' => Carbon::today()->subDays(2),
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 90,
            'hourly_rate' => 20.00,
            'date' => Carbon::today()->subDays(3),
            'company_id' => $learning_people->id,
        ]);
    }
}
