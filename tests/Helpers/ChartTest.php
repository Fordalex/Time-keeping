<?php

namespace Tests\Feature;

use Tests\TestCase;
use ChartHelper;
use App\Models\Company;
use App\Models\Shift;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChartTest extends TestCase
{
    use DatabaseTransactions;

    public function test_worked_days_of_the_week()
    {
        $company = Company::factory()->create();
        $sunday = Shift::factory()
            ->for($company)
            ->state([
                'date' => new Carbon('2022-08-07'),
            ])
            ->create();
        $tuesday = Shift::factory()
            ->for($company)
            ->state([
                'date' => new Carbon('2022-08-16'),
            ])
            ->create();
        $shifts = [$sunday, $tuesday];
        $chart_helper_data = ChartHelper::worked_days_of_the_week($shifts);
        $chart_data = "[
            ['Element', 'Density', { role: 'style' } ],
            ['Monday', 0, '#f24646'],
            ['Tuesday', 1, '#f2ca46'],
            ['Wednesday', 0, '#9cf246'],
            ['Thursday', 0, '#46f2b9'],
            ['Friday', 0, '#466cf2'],
            ['Saturday', 0, '#bf46f2'],
            ['Sunday', 1, '#f246b6'],
        ]";
        $this->assertEquals($chart_helper_data, $chart_data);
    }
}
