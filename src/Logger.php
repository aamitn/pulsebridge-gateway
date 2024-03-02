<?php

namespace Nmpl\Pulsebridge;

class Logger
{

    private $logPath;

    public function __construct($logPath)
    {
        $this->logPath = $logPath;
        if (!file_exists($logPath)) {
            mkdir($logPath, 0777, true);
        }
    }

    public function log($message)
    {
        $logFile = $this->logPath . 'app_log_' . date('Y-m-d') . '.log';
        ini_set("error_log", $logFile);
        error_log('[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL, 3, $logFile);
    }
}