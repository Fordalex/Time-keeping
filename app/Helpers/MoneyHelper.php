<?php

class MoneyHelper
{
    public static function format_money($amount)
    {
        $amount = number_format($amount, 2);
        return "£$amount";
    }
}

