<?php

namespace Tests;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class HandlerTest extends TestCase
{
    public function testHandler()
    {
        $logger = new Logger(HandlerTest::class);
        $handler = new StreamHandler('php://stderr');
        // $handler->setFormatter(new JsonFormatter());
        $logger->pushHandler($handler);
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));

        self::assertNotNull($logger);
        self::assertEquals(2, sizeof($logger->getHandlers()));
    }
}
