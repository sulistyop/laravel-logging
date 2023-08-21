<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello Info", ["user" => "sulistyo"]);

        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "sulistyo"]);

        Log::info("Hello Info");
        Log::info("Hello Info");
        Log::info("Hello Info");

        self::assertTrue(true);
    }

    public function testWithChannel()
    {
        $slackLogger = Log::channel('slack');
        $slackLogger->error("Hello Slack");// send to slack chanell

        Log::info("Hello Laravel"); // Send to default chanell

        self::assertTrue(true);
    }

    public function testFileHandler()
    {
        $fileLogger = Log::channel('file');
        $fileLogger->info("Hello File Handler");
        $fileLogger->warning("Hello File Handler");
        $fileLogger->error("Hello File Handler");
        $fileLogger->critical("Hello File Handler");

        self::assertTrue(true);
    }

}
