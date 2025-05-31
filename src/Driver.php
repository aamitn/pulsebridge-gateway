<?php

namespace Nmpl\Pulsebridge;

//require __DIR__ . '/../vendor/autoload.php';

// Dynamically check for Composer autoload, else import manually
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} else {
    require_once __DIR__ . '/Logger.php';
    require_once __DIR__ . '/Pulsebridge.php';
    require_once __DIR__ . '/PageRenderer.php';
}
class Driver
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;

        // Log a message indicating the initialization
        $this->logger->log('Driver initialization started.');

        // Log a message indicating the completion of initialization
        $this->logger->log('Driver initialization completed.');

    }

}
