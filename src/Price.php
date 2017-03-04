<?php

namespace Borovets\ADS;

use Borovets\ADS\Exception\UndefinedCurrencyException;

/**
 * Class Price
 * @package Borovets\ADS
 *
 * This class using for encapsulate work with price
 */
final class Price
{
    const CURRENCY_USD = 'USD';

    const CURRENCY_RUB = 'RUB';

    const CURRENCY_UAH = 'UAH';

    /**
     * @var int
     */
    private static $rubRate = 65;

    /**
     * @var int
     */
    private static $uahRate = 27;

    /**
     * @var float
     */
    private $priceInUsd;

    /**
     * Price constructor.
     *
     * @param $price
     */
    public function __construct(float $price)
    {
        $this->priceInUsd = $price;
    }

    /**
     * @param float $value
     */
    public static function setUahRate(float $value)
    {
        self::$uahRate = $value;
    }

    /**
     * @param float $value
     */
    public static function setRubRate(float $value)
    {
        self::$rubRate = $value;
    }

    /**
     * @param string $currencyCode
     * @param bool $formatPrice
     *
     * @return string
     *
     * @throws \Borovets\ADS\Exception\UndefinedCurrencyException
     */
    public function get($currencyCode = self::CURRENCY_RUB, $formatPrice = true)
    {
        return $this->getOfCurrency($currencyCode, $formatPrice);
    }

    /**
     * @param string $currencyCode
     * @param bool $formatPrice
     *
     * @return string
     *
     * @throws \Borovets\ADS\Exception\UndefinedCurrencyException
     *
     * @deprecated @see self::get()
     */
    public function getOfCurrency($currencyCode = self::CURRENCY_RUB, $formatPrice = true)
    {
        $price = $this->getBasePrice($currencyCode);

        if ($formatPrice) {
            return $this->format($price);
        }

        return $price;
    }

    /**
     * @param $currencyCode
     *
     * @return string
     *
     * @throws UndefinedCurrencyException
     */
    private function getBasePrice($currencyCode): string
    {
        switch ($currencyCode) {
            case self::CURRENCY_RUB:
                return $this->getPriceInRub();
            case self::CURRENCY_USD:
                return $this->getPriceInUsd();
            case self::CURRENCY_UAH:
                return $this->getPriceInUah();
            default:
                throw new UndefinedCurrencyException($currencyCode);
        }
    }

    /**
     * @return float
     */
    private function getPriceInRub()
    {
        return $this->priceInUsd * self::$rubRate;
    }

    /**
     * @return float
     */
    private function getPriceInUsd()
    {
        return $this->priceInUsd;
    }

    /**
     * @return float
     */
    private function getPriceInUah()
    {
        return $this->priceInUsd * self::$uahRate;
    }

    /**
     * @param float $price
     * @return string
     */
    private function format(float $price)
    {
        return number_format($price, 2, ',', ' ');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getPriceInUsd();
    }
}