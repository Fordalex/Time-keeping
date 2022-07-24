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
        DB::table('invoices')->delete();
        DB::table('companies')->delete();
        DB::table('billed_shifts')->delete();
        DB::table('shifts')->delete();

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

        $learning_people = Company::where('name', 'Learning People')->first();

        // create shifts
        DB::table('shifts')->insert([
            'duration' => 120,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-06-20'),
            'description' => "Introduction / Training",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-06-22'),
            'description' => "Training / Setup",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-06-25'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 30,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-06-26'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 135,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-06-27'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 75,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-06-29'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 30,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-06-30'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 30,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-01'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-04'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 135,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-06'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 30,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-07'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 75,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-08'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 150,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-16'),
            'description' => "Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 105,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-17'),
            'description' => "Marking a project / Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-18'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 15,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-19'),
            'description' => "Emails",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 120,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-20'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 90,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-21'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        // Invoice has been sent from 19th June 2022 - 21st July 2022 # Learning People ^^
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-22'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 30,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-24'),
            'description' => "Marking a project",
            'company_id' => $learning_people->id,
        ]);
    }
}
