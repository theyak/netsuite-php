<?php
/**
 * Implement this interface when creating custom logger classes for your
 * application.
 */

namespace NetSuite;

interface LoggerInterface
{
    /**
     * Instantiation of a Logger accepts an optional path to the folder
     * where logs should be stored.
     *
     * @param string $logPath
     */
    public function __construct(string $logPath = null);

    /**
     * Change the log directory on the fly.
     *
     * @param string $logPath
     * @return void
     */
    public function setLogPath(string $logPath): void;

    /**
     * Log the last soap call run through the given SoapClient.
     *
     * @param \SoapClient $client
     * @param string $operation
     * @return void
     */
    public function logSoapCall(\SoapClient $client, string $operation): void;
}
