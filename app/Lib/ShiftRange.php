<?php

namespace App\Lib;
use Auth;
use App\Models\Shift;

class ShiftRange
{
    public array $options;
    public $from_date, $to_date;

    public function __construct($from_date, $to_date, $options)
    {
        $this->options = $options;
        $this->from_date = $from_date;
        $this->to_date = $to_date;
        $this->shifts = $this->get_shifts();
    }

    public function get_shifts()
    {
        $shifts = Shift::all()->where('user_id', Auth::id())->sortby('date');
        if ($this->options['shift_filter'] == 'not_invoiced') {
            $shifts = $shifts->where('billed_shift', null);
        } else if ($this->options['shift_filter'] == 'invoiced') {
            $shifts = $shifts->where('billed_shift', '!=', null);
        }

        if ($this->options['company']) {
            $shifts = $shifts->where('company_id', $this->options['company']);
        }
        return $shifts->where('date', '>=', $this->from_date)->where('date', '<=', $this->to_date);
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

