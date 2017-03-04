<?php

namespace Borovets\ADS\Response;

use Borovets\ADS\AdRequestInterface;
use Borovets\ADS\Advertisement;
use Borovets\ADS\Exception\Exception;

/**
 * Class ResponseType
 * @package Borovets\ADS\Response
 */
final class ResponseFactory
{
    const RESPONSE_HTML = 'json';

    const RESPONSE_JSON = 'html';

    /**
     * Private constructor.
     * We can`t get instance of this class
     */
    private function __construct()
    {}

    /**
     * @param AdRequestInterface $request
     * @param Advertisement $ad
     *
     * @return AdResponseInterface
     *
     * @throws \Borovets\ADS\Exception\Exception
     */
    public static function getResponseFromRequest(AdRequestInterface $request, Advertisement $ad): AdResponseInterface
    {
        $responseType = $request->getResponseType();

        if ($responseType === 'json') {
            return new JsonAdResponse($ad);
        }

        if ($responseType === 'html') {
            return new HtmlAdResponse($ad);
        }

        throw new Exception(
            sprintf('Undefined response type: %s', $responseType)
        );
    }
}