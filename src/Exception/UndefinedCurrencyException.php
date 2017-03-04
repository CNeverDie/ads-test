<?php

namespace Borovets\ADS\Exception;

use Borovets\ADS\Price;
use Exception;

class UndefinedCurrencyException extends Exception
{
    public function __construct($currencyCode, $code = 0, Exception $previous = null)
    {
        $message = vsprintf('Using undefined currency in %s::getPrice(), currency code: %s', [
            Price::class, $currencyCode
        ]);

        parent::__construct($message, $code, $previous);
    }
}