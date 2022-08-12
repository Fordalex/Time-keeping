<?php

// Can I keep this generic and use this for Expenses?

namespace App\Lib;

class ShiftRange
{
    public function __construct($shifts, $from_date, $to_date)
    {
        $this->shifts = $shifts;
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function total_amount()
    {
        $total_amount = 0;
        foreach($this->shifts as $shift)
        {
            $total_amount += ($shift->duration / 60) * $shift->hourly_rate;
        }
        return $total_amount;
    }

    public function total_amount_after_tax()
    {
        return $this->total_amount() * 0.8;
    }

    public function total_duration()
    {
        return $this->shifts->sum('duration');
    }

    public function total_days()
    {
        return $this->from_date->diffInDays($this->to_date);
    }

    public function shift_count()
    {
        return count($this->shifts);
    }
}

