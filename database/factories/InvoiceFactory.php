<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'from_date' => Carbon::today()->subDays(30),
            'to_date' => Carbon::tomorrow(),
            'due_date' => Carbon::today(),
            'company_id' => '',
            'company_name' => 'Learning People',
            'company_address' => 'Testing address',
            'terms' => 'Payment within 14 days',
            'bank' => 'YOUI',
            'account_number' => '01010101',
            'sort_code' => '00-00-00',
            'number' => '001',
            'sent' => false,
            'paid' => false,
        ];
    }
}
