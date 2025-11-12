<?php

namespace AlwaysOpen\BwtApi\Tests;

use AlwaysOpen\BwtApi\BwtApiServiceProvider;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase;

class BaseTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('vendor:publish', [
            '--provider' => BwtApiServiceProvider::class,
            '--tag' => 'config',
        ]);

        Http::preventStrayRequests();

        $this->refreshApplication();
    }

    protected function getFixtureJsonContent(string $name): string
    {
        $content = $this->getFixtureContent($name);

        if ($content) {
            return $content;
        }

        return '{}';
    }

    protected function getFixtureContent(string $name): false|string
    {
        return file_get_contents(__DIR__."/Fixtures/{$name}");
    }

    protected function getPackageProviders($app)
    {
        return [
            BwtApiServiceProvider::class,
        ];
    }
}
