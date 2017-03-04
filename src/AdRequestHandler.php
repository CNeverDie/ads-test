<?php

namespace Borovets\ADS;

use Borovets\ADS\Response\AdResponseInterface;
use Borovets\ADS\Response\ResponseFactory;
use Borovets\ADS\Source\AdSource;
use Borovets\ADS\Source\AdSourceType;
use Borovets\ADS\Source\DaemonSource;
use Borovets\ADS\Source\DBSource;
use Psr\Log\LoggerInterface;

class AdRequestHandler
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var AdRequestInterface
     */
    private $request;

    /**
     * AdRequestHandler constructor.
     *
     * @param LoggerInterface $logger
     * @param AdRequestInterface $request
     */
    public function __construct(LoggerInterface $logger, AdRequestInterface $request)
    {
        $this->logger = $logger;
        $this->request = $request;
    }

    /**
     * @return AdResponseInterface
     *
     * @throws \Borovets\ADS\Exception\Exception
     */
    public function handle(): AdResponseInterface
    {
        $this->log('Handle request', [
            'id' => $this->request->getAdID(),
            'source' => $this->request->getSource(),
            'responseType' => $this->request->getResponseType()
        ]);

        $source = $this->getSource();

        $this->log('Using source: ' . $source::getLogInfo($this->request->getAdID()));

        $ad = $source->getAd($this->request->getAdID());

        return ResponseFactory::getResponseFromRequest($this->request, $ad);
    }

    /**
     * @param string $message
     * @param array $context
     */
    private function log(string $message, $context = [])
    {
        if ($this->request->isLoggingEnable()) {
            $time = date(DATE_ATOM);

            $this->logger->info(
                "{$message}", $context
            );
        }
    }

    /**
     * @return AdSource
     *
     * @throws \Borovets\ADS\Exception\Exception
     */
    private function getSource(): AdSource
    {
        $sourceType = strtolower($this->request->getSource());

        switch ($sourceType) {
            case AdSourceType::SOURCE_MYSQL:
                $source = new DBSource();
                break;
            case AdSourceType::SOURCE_DAEMON;
                $source = new DaemonSource();
                break;
            default:
                throw new \Borovets\ADS\Exception\Exception('Undefined source type');
        }

        return $source;
    }
}