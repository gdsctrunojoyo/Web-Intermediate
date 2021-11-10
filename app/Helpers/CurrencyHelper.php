<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function toRupiah($value)
    {
        return 'Rp. '.number_format($value, 0, ',', '.');
    }
}