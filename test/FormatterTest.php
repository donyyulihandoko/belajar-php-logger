<?php

namespace Tests;

use Monolog\Formatter\HtmlFormatter;
use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class FormatterTest extends TestCase
{
    public function testFormatter()
    {
        $logger = new Logger(FormatterTest::class);
        $handler = new StreamHandler(__DIR__ . '/../application.log');
        $handler->setFormatter(new JsonFormatter(JSON_PRETTY_PRINT));

        $logger->pushHandler($handler);
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());

        $logger->info('Info Message', [
            'username' => 'Dony Yuli Handoko'
        ]);
        self::assertNotNull($logger);
    }
}
