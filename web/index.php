<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require __DIR__ . '/../vendor/autoload.php';

const LOG_FILE = __DIR__ . '/../var/ads.log';

$log = new Logger('AD System', [new StreamHandler(LOG_FILE)]);

try {
    $request = \Borovets\ADS\AdRequest::createFromGlobals();

    $handler = new \Borovets\ADS\AdRequestHandler($log, $request);

    $response = $handler->handle();

    echo $response->render();

} catch (\Borovets\ADS\Exception\Exception $exception) {
    $log->critical('Catch exception:', ['exception' => (string) $exception]);

    echo sprintf('<h2>Something like wrong. See log file in:</h2><code>%s</code>', realpath(LOG_FILE));
}
