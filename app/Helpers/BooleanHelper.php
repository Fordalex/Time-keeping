<?php

use Collective\Html\Eloquent\FormAccessible;

class BooleanHelper
{
    public static function tick_or_cross($boolean)
    {
        $file_name = $boolean ? 'tick' : 'cross';
        return HTML::image("images/{$file_name}.png", 'tick', ['class'=>'paid-icon']);
    }
}

