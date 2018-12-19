<?php

namespace HealthEngine\Laravel\Logging;

use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\UidProcessor;
use Monolog\Processor\WebProcessor;

/**
 * Class ProcessorTap
 * @package HealthEngine\Laravel\Extensions\Logging
 *
 * A custom logging tap that will add various useful processors to enrich logs to a given logger instance.
 */
class ProcessorTap
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger)
    {
        // $logger->pushProcessor(new HostnameProcessor()); // TODO: maybe useful? but maybe not in kubernetes
        // $logger->pushProcessor(new IntrospectionProcessor()); // TODO: maybe useful?
        $logger->pushProcessor(new MemoryPeakUsageProcessor(true, false));
        $logger->pushProcessor(new MemoryUsageProcessor(true, false));
        // $logger->pushProcessor(new TagProcessor()); // TODO: use this or a custom one to add extra tags
        $logger->pushProcessor(new UidProcessor());
        $logger->pushProcessor(new WebProcessor()); // TODO: research constructor arguments like monolith
    }
}
