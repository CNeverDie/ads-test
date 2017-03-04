<?php

namespace Borovets\ADS\Response;

use Borovets\ADS\Advertisement;

abstract class AbstractResponse implements AdResponseInterface
{
    /**
     * @var Advertisement
     */
    protected $ad;

    /**
     * HtmlAdResponse constructor.
     *
     * @param Advertisement $ad
     */
    public function __construct(Advertisement $ad)
    {
        $this->ad = $ad;
    }

    public function getAdvertisement(): Advertisement
    {
        return $this->ad;
    }
}