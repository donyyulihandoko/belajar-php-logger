<?php

namespace Tests;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessor()
    {
        $logger = new Logger(ProcessorTest::class);

        $logger->pushHandler(new StreamHandler('php://stderr'));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));

        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(function ($record) {
            $record['extra']['pzn'] = [
                'app' => 'belajar php logging',
                'author' => 'Dony Yuli Handoko'
            ];
            return $record;
        });

        $logger->info('Info message', ['username' => 'Dony Yuli Handoko']);
        self::assertNotNull($logger);
    }

    public function testResetLogger()
    {
        $logger = new Logger(ProcessorTest::class);

        $logger->pushHandler(new StreamHandler('php://stderr'));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));

        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(function ($record) {
            $record['extra']['pzn'] = [
                'app' => 'belajar php logging',
                'author' => 'Dony Yuli Handoko'
            ];
            return $record;
        });

        for ($i = 0; $i < 1000; $i++) {
            $logger->info("Loger $i");
            if ($i % 100 == 0) {
                $logger->reset();
            }
        }
        self::assertNotNull($logger);
    }
}
