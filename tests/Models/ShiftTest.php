<?php

namespace Tests\Models;

use Tests\TestCase;
use App\Models\Shift;
use App\Models\Company;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShiftTest extends TestCase
{
    use DatabaseTransactions;

    public function test_total_earnt()
    {
        $company = Company::factory()->create();
        $shift = Shift::factory()
            ->for($company)
            ->state([
                'hourly_rate' => 20,
                'duration' => 90
                ])
            ->create();
        $this->assertEquals($shift->total_earnt(), 30);
    }
}
