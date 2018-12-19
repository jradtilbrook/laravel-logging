<?php

namespace HealthEngine\Laravel\Logging;

use Monolog\Formatter\LogstashFormatter;

/**
 * Class LogstashTap
 * @package HealthEngine\Laravel\Extensions\Logging
 *
 * A custom logging tap that will add a logstash formatter to every handler of a given logger instance.
 */
class LogstashTap
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger)
    {
        $formatter = new LogstashFormatter(config('app.name'));

        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter($formatter);
        }
    }
}
