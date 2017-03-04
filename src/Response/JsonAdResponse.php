<?php

namespace Borovets\ADS\Response;

class JsonAdResponse extends AbstractResponse
{
    public function render()
    {
        return json_encode($this->getAdvertisement());
    }
}