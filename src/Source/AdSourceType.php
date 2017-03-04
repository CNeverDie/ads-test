<?php
/**
 * Created by PhpStorm.
 * User: alexandr
 * Date: 04.03.2017
 * Time: 13:04
 */

namespace Borovets\ADS\Source;

/**
 * Contains list of all available sources
 */
final class AdSourceType
{
    const SOURCE_MYSQL = 'mysql';

    const SOURCE_DAEMON = 'daemon';

    /**
     * Private constructor. We can`t get object instants
     */
    private function __construct()
    {
    }
}