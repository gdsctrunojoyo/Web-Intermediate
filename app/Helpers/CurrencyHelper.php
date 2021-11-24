<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function format($value, $currency='IDR')
    {
        if($currency == 'IDR'){
            return 'Rp '.number_format($value, 0, ',', '.');
        } else {
            return $value;
        }
    }
}