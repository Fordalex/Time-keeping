<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Company;
use InvoiceHelper;
use DB;

class LearningPeopleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $learning_people = Company::firstWhere('name', 'Learning People');

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

        $invoice_attributes_july = [
            'from_date' => new Carbon('2022-06-19'),
            'to_date' => new Carbon('2022-07-21'),
            'due_date' => new Carbon('2022-08-04'),
            'company_id' => $learning_people->id,
            'terms' => 'Payment within 14 days',
            'bank' => 'HSBC',
            'account_number' => env('SORT_CODE'),
            'sort_code' => env('ACCOUNT_NUMBER'),
            'paid' => true,
            'sent' => true
        ];
        InvoiceHelper::create_invoice($invoice_attributes_july);

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
        DB::table('shifts')->insert([
            'duration' => 30,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-25'),
            'description' => "Prep for tomorrows meeting",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-26'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 30,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-27'),
            'description' => "Mentoring / Emails / Slack",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-07-28'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 105,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-07-29'),
            'description' => "Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 90,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-07-31'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 75,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-01'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 105,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-02'),
            'description' => "Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 75,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-03'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 90,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-06'),
            'description' => "Mentoring / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 120,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-08'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 15,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-11'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-13'),
            'description' => "Mentoring / Emails",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 15,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-14'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 45,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-15'),
            'description' => "Mentoring",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 45,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-16'),
            'description' => "Started marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 30,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-18'),
            'description' => "Mentoing",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 180,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-21'),
            'description' => "Mentoing / Marking projects",
            'company_id' => $learning_people->id,
        ]);

        $invoice_attributes_aug = [
            'from_date' => new Carbon('2022-07-22'),
            'to_date' => new Carbon('2022-08-21'),
            // 'to_date' => Carbon::today(),
            'due_date' => new Carbon('2022-09-04'),
            'company_id' => $learning_people->id,
            'terms' => 'Payment within 14 days',
            'bank' => 'HSBC',
            'account_number' => env('SORT_CODE'),
            'sort_code' => env('ACCOUNT_NUMBER'),
            'paid' => true,
            'sent' => true,
        ];
        InvoiceHelper::create_invoice($invoice_attributes_aug);

        DB::table('shifts')->insert([
            'duration' => 75,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-23'),
            'description' => "Mentoing",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-28'),
            'description' => "Mentoing",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 135,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-08-29'),
            'description' => "Mentoing",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 195,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-04'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 75,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-05'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 90,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-06'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 75,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-07'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 105,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-08'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-09'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-10'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 45,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-11'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 45,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-12'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 90,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-13'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-14'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 105,
            'hourly_rate' => 25.00,
            'date' => new Carbon('2022-09-15'),
            'description' => "Mentoing / Marking a project",
            'company_id' => $learning_people->id,
        ]);


        $invoice_attributes_sep = [
            'from_date' => new Carbon('2022-08-22'),
            // 'to_date' => new Carbon('2022-09-21'),
            'to_date' => Carbon::today(),
            'due_date' => new Carbon('2022-10-05'),
            'company_id' => $learning_people->id,
            'terms' => 'Payment within 14 days',
            'bank' => 'HSBC',
            'account_number' => env('SORT_CODE'),
            'sort_code' => env('ACCOUNT_NUMBER'),
            'paid' => false,
            'sent' => false,
        ];
        InvoiceHelper::create_invoice($invoice_attributes_sep);
    }
}

