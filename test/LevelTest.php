<?php

namespace Tests;

use Monolog\Test\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LevelTest extends TestCase
{
    public function testLevel()
    {
        $logger = new Logger(LevelTest::class);
        $logger->pushHandler(new StreamHandler('php://stderr'));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../warning.log', Logger::WARNING));

        $logger->debug('ini adalah level debug');
        $logger->info('ini adalah level info');
        $logger->notice('ini adalah level notice');
        $logger->warning('ini adalah level debug warning');
        $logger->error('ini adalah level error');
        $logger->critical('ini adalah level critical');
        $logger->alert('ini adalah level alert');
        $logger->emergency('ini adalah level emergency');

        self::assertNotNull($logger);
    }
}
