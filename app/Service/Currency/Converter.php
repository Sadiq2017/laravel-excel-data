<?php

declare(strict_types=1);

namespace App\Service\Currency;


class Converter
{
    public static function convertedPrice(float $price, string $currency = 'usd')
    {
        $convert_value = 0;

        if (in_array(strtoupper($currency), Currency::getKeys())) {
            $convert_value = Currency::getValue(strtoupper($currency));
        }

        return $price * $convert_value;
    }
}
