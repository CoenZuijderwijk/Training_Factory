<?php


namespace App\Service;


use Psr\Log\LoggerInterface;


class MessageGenerator
{
    private $logger;

    public function __construct(LoggerInterface $coenLogger)
    {
      $this->logger = $coenLogger;
    }

    public function testlog()
    {
        $this->logger->info("MessageGenerator testlog");
    }

}