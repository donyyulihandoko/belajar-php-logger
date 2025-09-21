<?php

namespace Tests;

use Monolog\Test\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler('php://stderr'));

        $logger->info('This is info message', [
            'username' => 'Dony'
        ]);
        self::assertNotNull($logger);
    }
}
