<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Expense;
use App\Models\User;
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
        $user = User::firstWhere('email', 'admin@example.com');

        // create companies
        DB::table('companies')->insert([
            'user_id' => $user->id,
            'name' => 'Learning People',
            'first_line_address' => 'The Agora',
            'city' => 'Ellen Street',
            'country' => 'HOVE',
            'postcode' => 'BN3 3LN',
            'initial_invoice_no' => 0,
        ]);
        DB::table('companies')->insert([
            'user_id' => $user->id,
            'name' => 'Continental Traveller',
            'first_line_address' => 'something',
            'city' => 'something',
            'country' => 'UK',
            'postcode' => 'ddddd',
            'initial_invoice_no' => 0
        ]);
        DB::table('companies')->insert([
            'user_id' => $user->id,
            'name' => 'Commit Digital',
            'first_line_address' => 'something',
            'city' => 'something',
            'country' => 'UK',
            'postcode' => 'ddddd',
            'initial_invoice_no' => 4
        ]);
    }
}

