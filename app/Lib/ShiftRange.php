<?php

namespace App\Lib;
use Auth;
use App\Models\Shift;

class ShiftRange
{
    public function __construct($from_date, $to_date)
    {
        $user_id = Auth::id();
        $this->shifts = Shift::all()->where('user_id', $user_id)->where('date', '>=', $from_date)->where('date', '<=', $to_date)->sortby('date');;
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

    public function average_per_day()
    {
        return $this->total_amount() / $this->total_days();
    }
}

