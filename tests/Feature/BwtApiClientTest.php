<?php

namespace AlwaysOpen\BwtApi\Tests\Feature;

use AlwaysOpen\BwtApi\BwtApiClient;
use AlwaysOpen\BwtApi\Tests\BaseTest;
use Illuminate\Support\Facades\Http;

class BwtApiClientTest extends BaseTest
{
    public function test_amazon_response()
    {
        Http::fake([
            'https://bwt.com/api/123/results?limit=1&offset=0' => Http::response($this->getFixtureJsonContent('job_results.json'), 200),
        ]);

        $client = new BwtApiClient;

        $response = $client->getAmazonResults(123);

        $this->assertNotEmpty($response->items);
    }
}
