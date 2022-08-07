<?php

use Illuminate\Support\Carbon;

class ChartHelper
{
    public static function worked_days_of_the_week($shifts)
    {
        $days_worked = [
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
            'Sunday' => 0,
        ];
        foreach($shifts as $shift)
        {
            $day = $shift->date->format('l');
            $days_worked[$day] += 1;
        }
        $monday = $days_worked['Monday'];
        $tuesday = $days_worked['Tuesday'];
        $wednesday = $days_worked['Wednesday'];
        $thursday = $days_worked['Thursday'];
        $friday = $days_worked['Friday'];
        $saturday = $days_worked['Saturday'];
        $sunday = $days_worked['Sunday'];

        return "[
            ['Element', 'Density', { role: 'style' } ],
            ['Monday', {$monday}, '#f24646'],
            ['Tuesday', {$tuesday}, '#f2ca46'],
            ['Wednesday', {$wednesday}, '#9cf246'],
            ['Thursday', {$thursday}, '#46f2b9'],
            ['Friday', {$friday}, '#466cf2'],
            ['Saturday', {$saturday}, '#bf46f2'],
            ['Sunday', {$sunday}, '#f246b6'],
        ]";
    }
}
