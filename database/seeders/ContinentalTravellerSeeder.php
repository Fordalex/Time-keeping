<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Company;
use InvoiceHelper;
use DB;

class CommitDigitalSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $continental_traveller = Company::firstWhere('name', 'Continental Traveller');

        // create shifts
        DB::table('shifts')->insert([
            'duration' => 60,
            'hourly_rate' => 30.00,
            'date' => new Carbon('2022-09-26'),
            'description' => "continentaltraveller.com: Added CRUD for pages.",
            'company_id' => $continental_traveller->id,
        ]);

        DB::table('shifts')->insert([
            'duration' => 75,
            'hourly_rate' => 30.00,
            'date' => new Carbon('2022-09-25'),
            'description' => "continentaltraveller.com: Missing specs and test files / Fixed link on live site.",
            'company_id' => $continental_traveller->id,
        ]);

        DB::table('shifts')->insert([
            'duration' => 15,
            'hourly_rate' => 30.00,
            'date' => new Carbon('2022-09-28'),
            'description' => "Support / Planning",
            'company_id' => $continental_traveller->id,
        ]);

        $invoice_attributes_dec = [
            'from_date' => new Carbon('2022-07-25'),
            // 'to_date' => new Carbon('2022-12-01'),
            'to_date' => Carbon::today(),
            'due_date' => new Carbon('2022-12-15'),
            'company_id' => $continental_traveller->id,
            'terms' => 'Payment within 14 days',
            'bank' => 'HSBC',
            'account_number' => env('SORT_CODE'),
            'sort_code' => env('ACCOUNT_NUMBER'),
            'paid' => false,
            'sent' => false
        ];
        InvoiceHelper::create_invoice($invoice_attributes_dec);
    }
}

