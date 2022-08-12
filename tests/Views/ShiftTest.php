<?php

namespace Tests\Views;

use Tests\TestCase;
use App\Models\Shift;
use App\Models\Company;
use App\Lib\ShiftRange;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShiftTest extends TestCase
{
    use DatabaseTransactions;

    public function test_shifts_index()
    {
        $company = Company::factory()->create();
        Shift::factory()->for($company)->create();
        $shifts = Shift::all();
        $total_duration = 60;
        $total_earnt = 20.0;
        $from_date = Carbon::today();
        $to_date = Carbon::tomorrow();
        $shift_range = new ShiftRange($from_date, $to_date);

        $view = $this->view('shifts.index', [
            'shift_range' => $shift_range
        ]);

        // dd($view);
        $view->assertSee('Days');
        // $view->assertView('button')->hasClass('btn')->contains('something');
    }
}
