<?php

namespace Tests\Helpers;

use Tests\TestCase;
use MoneyHelper;
use App\Models\Company;
use App\Models\Shift;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MoneyTest extends TestCase
{
    use DatabaseTransactions;

    public function test_format_money()
    {
        $company = Company::factory()->create();
        Shift::factory()
            ->for($company)
            ->create();
        $this->assertEquals(MoneyHelper::format_money(100), "£100.00");
    }

    public function test_total_earnt()
    {
        $company = Company::factory()->create();
        Shift::factory()
            ->for($company)
            ->state([
                'duration' => 120,
                'hourly_rate' => 50
            ])
            ->create();
        $shifts = Shift::all();
        $this->assertEquals(MoneyHelper::total_earnt($shifts), 100.00);
    }
}
