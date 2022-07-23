<?php

class MoneyHelper
{
    public static function format_money($amount)
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
            // error_log($total_earnt);
        }
        return $total_earnt;
    }
}

