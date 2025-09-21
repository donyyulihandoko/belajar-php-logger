<?php

namespace Tests;

use DateTime;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $logger = new Logger(LoggerTest::class);
        $logger->pushHandler(new StreamHandler('php://stderr'));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));

        $logger->info('Selamat Belajar PHP Logging');
        $logger->info(json_encode(new DateTime()));
        self::assertNotNull($logger);
    }
}
