<?php

class MoneyHelper
{
    public static function format_amount($amount)
    {
        $amount = number_format($amount, 2);
        return "£$amount";
    }

    public static function total_earnt($shifts)
    {
        $total_earnt = 0;
        foreach($shifts as $shift)
        {
            $total_earnt += ($shift->duration / 60) * $shift->hourly_rate;
        }
        return $total_earnt;
    }
}

