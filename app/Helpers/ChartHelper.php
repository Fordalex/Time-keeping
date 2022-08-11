<?php

use Illuminate\Support\Carbon;

class ChartHelper
{
    public static function popular_days_worked_for_bar_graph($shifts)
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

    public static function duration_per_day_for_timeline(object $shifts)
    {
        $days = [];
        $first_shift = $shifts->first();
        $last_shift = $shifts->last();
        $total_days = $first_shift->date->diffInDays($last_shift->date);

        // Create days hash
        for ($n = 0; $n <= $total_days; $n++)
        {
            $key = strval($first_shift->date->addDays($n)->format('M d'));
            $days[$key] = 0;
        }

        // Populate days with amount earnt
        foreach ($shifts as $shift)
        {
            $days[$shift->date->format('M d')] = $shift->total_earnt();
        }

        // format string to add to JS
        $days_with_amount = "";
        foreach ($days as $key=>$value)
        {
            $days_with_amount .= "['{$key}', {$value}],";
        }

        return "[
            ['Day', 'Earnt'],{$days_with_amount}
        ]";
    }
}
