<?php

namespace Borovets\ADS\Response;

use Borovets\ADS\Advertisement;

/**
 * Interface AdResponseInterface
 * @package Borovets\ADS\Response
 */
interface AdResponseInterface
{
    /**
     * @return Advertisement
     */
    public function getAdvertisement(): Advertisement;

    /**
     * @return mixed
     */
    public function render();
}