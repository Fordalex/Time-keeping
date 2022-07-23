<?php

class TimeHelper
{
    public static function format_minutes($minutes, $space)
    {
        $hours = intval($minutes / 60);
        $remaining_minutes = (($minutes / 60) - $hours) * 60;
        return "{$hours}H{$space}{$remaining_minutes}M";
    }
}

