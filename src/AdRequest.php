<?php

namespace Borovets\ADS;

class AdRequest implements AdRequestInterface
{
    /**
     * @var int
     */
    private $adId;

    /**
     * @var string
     */
    private $source;

    /**
     * @var bool
     */
    private $loggingStatus;

    /**
     * @var string
     */
    private $responseType;

    /**
     * AdRequest constructor.
     * @param int $id
     * @param string $source
     * @param bool $loggingStatus
     * @param string $responseType
     */
    public function __construct(int $id, string $source, bool $loggingStatus = false, string $responseType = 'html')
    {
        $this->adId = $id;
        $this->source = $source;
        $this->loggingStatus = $loggingStatus;
        $this->responseType = $responseType;
    }

    /**
     * @return AdRequest
     */
    public static function createFromGlobals()
    {
        return new self(
            $_GET['id'] ?? 1,
            $_GET['from'] ?? 'mysql',
            $_GET['log'] ?? false,
            $_GET['response_type'] ?? 'html'
        );
    }

    /**
     * @param array $cliArguments
     * @return AdRequest
     */
    public static function createFromConsoleArguments(array $cliArguments)
    {
        return new self(
            (int)$cliArguments[1] ?? 1,
            (string)$cliArguments[2] ?? 'mysql',
            (bool)$cliArguments[3] ?? true,
            (string)$cliArguments['4'] ?? 'json'
        );
    }

    /**
     * @inheritdoc
     */
    public function getAdID(): int
    {
        return $this->adId;
    }

    /**
     * @inheritdoc
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @inheritdoc
     */
    public function isLoggingEnable(): bool
    {
        return $this->loggingStatus;
    }

    /**
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->responseType;
    }
}