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
        $commit_digital = Company::firstWhere('name', 'Commit Digital');

        // create shifts
        DB::table('shifts')->insert([
            'duration' => 360,
            'hourly_rate' => 17.50,
            'date' => new Carbon('2022-03-05'),
            'description' => "TheMetalStore",
            'company_id' => $commit_digital->id,
        ]);
        $invoice_attributes_march = [
            'from_date' => new Carbon('2022-03-05'),
            'to_date' => new Carbon('2022-03-06'),
            'due_date' => new Carbon('2022-04-27'),
            'company_id' => $commit_digital->id,
            'terms' => 'Payment within 14 days',
            'bank' => 'HSBC',
            'account_number' => env('SORT_CODE'),
            'sort_code' => env('ACCOUNT_NUMBER'),
            'paid' => true,
            'sent' => true
        ];
        InvoiceHelper::create_invoice($invoice_attributes_march);
        DB::table('shifts')->insert([
            'duration' => 360,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-04-30'),
            'description' => "TheMetalStore",
            'company_id' => $commit_digital->id,
        ]);
        DB::table('shifts')->insert([
            'duration' => 420,
            'hourly_rate' => 20.00,
            'date' => new Carbon('2022-05-15'),
            'description' => "TheMetalStore",
            'company_id' => $commit_digital->id,
        ]);
        $invoice_attributes_april = [
            'from_date' => new Carbon('2022-04-30'),
            'to_date' => new Carbon('2022-05-15'),
            'due_date' => new Carbon('2022-05-29'),
            'company_id' => $commit_digital->id,
            'terms' => 'Payment within 14 days',
            'bank' => 'HSBC',
            'account_number' => env('SORT_CODE'),
            'sort_code' => env('ACCOUNT_NUMBER'),
            'paid' => true,
            'sent' => true
        ];
        InvoiceHelper::create_invoice($invoice_attributes_april);
    }
}

