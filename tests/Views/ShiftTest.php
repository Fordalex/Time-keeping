<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Shift;
use App\Models\Company;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShiftTest extends TestCase
{
    use DatabaseTransactions;

    public function test_shifts_index()
    {
        $company = Company::factory()->create();
        $shifts = array(Shift::factory()->for($company)->create());
        $total_duration = 60;
        $total_earnt = 20.0;
        $from_date = Carbon::today();
        $to_date = Carbon::tomorrow();

        $view = $this->view('shifts.index', [
            'shifts' => $shifts,
            'total_duration' => $total_duration,
            'total_earnt' => $total_earnt,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);

        // dd($view);
        $view->assertSee('Days');
        // $view->assertView('button')->hasClass('btn')->contains('something');
    }
}
