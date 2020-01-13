<?php


namespace App\Log;


use Psr\Log\LoggerInterface;

class CustomLogger
{
    private $logger;

    public function __construct(LoggerInterface $coenLogger)
    {
        $this->logger = $coenLogger;
        $coenLogger->notice("customlogger.php opgestart");
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function adminHomepage(LoggerInterface $coenLogger, $user)
    {
        $this->logger = $coenLogger;

        $coenLogger->notice("customlogger adminHomepage" . $user);
    }

}