<?php

namespace WanderingTrader\Log;

use Psr\Log\LoggerAwareTrait as BaseLoggerAwareTrait;
use Psr\Log\LogLevel;

/**
 * Convenience trait for logging.
 */
trait LoggerAwareTrait
{
    use BaseLoggerAwareTrait;

    /**
     * Add log message.
     *
     * @param string $level   Names can be found in \Psr\Log\LogLevel.
     * @param string $message Log message.
     * @param array  $context Extra context.
     *
     * @return bool
     */
    public function log($level, $message, array $context = array())
    {
        if (!$this->logger) {
            return false;
        }

        switch ($level) {
            case LogLevel::EMERGENCY:
                $this->logger->emergency($message, $context);
                return true;

            case LogLevel::ALERT:
                $this->logger->alert($message, $context);
                return true;

            case LogLevel::CRITICAL:
                $this->logger->critical($message, $context);
                return true;

            case LogLevel::ERROR:
                $this->logger->error($message, $context);
                return true;

            case LogLevel::WARNING:
                $this->logger->warning($message, $context);
                return true;

            case LogLevel::NOTICE:
                $this->logger->notice($message, $context);
                return true;

            case LogLevel::INFO:
                $this->logger->info($message, $context);
                return true;

            case LogLevel::DEBUG:
                $this->logger->debug($message, $context);
                return true;
        }

        throw new \InvalidArgumentException(sprintf('%s level is not valid.', $level));
    }
}