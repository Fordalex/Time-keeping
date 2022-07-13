<?php

class TimeHelper
{
    public static function format_minutes($minutes)
    {
        $hours = intval($minutes / 60);
        $remaining_minutes = (($minutes / 60) - $hours) * 60;
        return "{$hours}H{$remaining_minutes}M";
    }
}

