<?php


namespace App\Service;


use Psr\Log\LoggerInterface;


class MessageGenerator
{
    private $customLogger;

    public function __construct(LoggerInterface $customLogger)
    {
      $this->logger = $customLogger;
      $customLogger->notice("test");
    }

}