<?php

namespace Borovets\ADS;

use Borovets\ADS\Response\HtmlAdResponse;

/**
 * Interface AdRequestInterface
 * @package Borovets\ADS
 */
interface AdRequestInterface
{
    /**
     * @return int
     */
    public function getAdID(): int;

    /**
     * @return string
     */
    public function getSource(): string;

    /**
     * @return bool
     */
    public function isLoggingEnable(): bool;

    /**
     * @return string
     */
    public function getResponseType(): string;
}