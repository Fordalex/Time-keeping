<?php

namespace Tests\Helpers;

use Tests\TestCase;
use ChartHelper;
use App\Models\Company;
use App\Models\Shift;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChartTest extends TestCase
{
    use DatabaseTransactions;

    public function test_popular_days_worked_for_bar_graph()
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
        $shifts = Shift::all();
        $chart_helper_data = ChartHelper::popular_days_worked_for_bar_graph($shifts);
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

    public function test_duration_per_day_for_timeline()
    {
        $company = Company::factory()->create();
        Shift::factory()
            ->for($company)
            ->state([
                'date' => new Carbon('2022-08-07'),
                'duration' => 60,
                'hourly_rate' => 20
            ])
            ->create();
        Shift::factory()
            ->for($company)
            ->state([
                'date' => new Carbon('2022-08-10'),
                'duration' => 120,
                'hourly_rate' => 20
            ])
            ->create();
        // why is this returning an array and not a collection?
        $shifts = Shift::all()->sortby('date');
        $timeline_helper_data = ChartHelper::duration_per_day_for_timeline(collect($shifts));
        $timeline_data = "[
            ['Day', 'Earnt'],['Aug 07', 20],['Aug 08', 0],['Aug 09', 0],['Aug 10', 40],
        ]";
        $this->assertEquals($timeline_helper_data, $timeline_data);
    }
}
