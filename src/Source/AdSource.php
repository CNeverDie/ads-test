<?php

namespace Borovets\ADS\Source;

use Borovets\ADS\Advertisement;

interface AdSource
{
    /**
     * Get Advertisement from source
     *
     * @param int $id
     *
     * @return Advertisement
     */
    public function getAd(int $id): Advertisement;

    /**
     * Return info about source for loggers
     *
     * @param $id
     *
     * @return string
     */
    public static function getLogInfo($id): string;
}