<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Expense;
use DB;

class CleanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // delete all
        DB::table('users')->delete();
        DB::table('expenses')->delete();
        DB::table('invoices')->delete();
        DB::table('companies')->delete();
        DB::table('billed_shifts')->delete();
        DB::table('shifts')->delete();
    }
}
