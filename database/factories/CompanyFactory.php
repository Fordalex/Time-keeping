<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'first_line_address' => "12 Testing street",
            'city' => fake()->city(),
            'country' => fake()->country(),
            'postcode' => fake()->postcode(),
            'initial_invoice_no' => 0,
        ];
    }
}
