<?php

namespace App\Helpers;

class OrderHelper
{
    public static function generateInvNo ($last) {
        $last = $last + 1;
        $number = sprintf('%05d', $last);
        return "INV-". $number;
    }
}