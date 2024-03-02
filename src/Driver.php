<?php

namespace Nmpl\Pulsebridge;

require __DIR__ . '/../vendor/autoload.php';


class Driver
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;

        // Log a message indicating the initialization
        $this->logger->log('Driver initialization started.');

        // Some tricks to load the Pulsebridge and PageRenderer classes in different situations
        if (!class_exists('Nmpl\Pulsebridge\Pulsebridge') || !class_exists('Nmpl\Pulsebridge\PageRenderer')) {
            if (file_exists('src\Pulsebridge.php') && file_exists('src\PageRenderer.php')) {
                // Quick load of Pulsebridge and PageRenderer without using composer
                require_once 'Pulsebridge.php';
                require_once 'PageRenderer.php';
                // Log a message indicating the successful loading of classes
                $this->logger->log('Pulsebridge and PageRenderer classes loaded without Composer.');
            } else {
                // Composer autoload
                require __DIR__ . '/../vendor/autoload.php';

                // Log a message indicating the use of Composer autoload
                $this->logger->log('Pulsebridge and PageRenderer classes loaded using Composer autoload.');
            }
        }

        // Log a message indicating the completion of initialization
        $this->logger->log('Driver initialization completed.');

    }

}
