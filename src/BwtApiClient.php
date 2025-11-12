<?php

namespace AlwaysOpen\BwtApi;

use AlwaysOpen\BwtApi\DTOs\Amazon\AmazonRequestCreationResponse;
use AlwaysOpen\BwtApi\DTOs\Amazon\AmazonResults;
use AlwaysOpen\BwtApi\DTOs\BatchRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use Throwable;

class BwtApiClient
{
    protected ?string $baseUrl = null;

    protected ?string $apiKey = null;

    public function __construct(
        ?string $baseUrl = null,
        ?string $apiKey = null,
    ) {
        $this->baseUrl = $baseUrl ?? config('bwt-api.base_url', 'https://bwt.com/api/');
        $this->apiKey = $apiKey ?? config('bwt-api.username') ?? '';
    }

    protected function getAuthHeader(): array
    {
        return [
            'Authorization' => 'Bearer '.$this->apiKey,
        ];
    }

    /**
     * @throws GuzzleException|Throwable
     */
    protected function makeRequest(
        string $method,
        string $uri,
        ?array $payload = null,
        ?int $retryCount = null,
    ): Response {
        $request = new Request(
            method: $method,
            uri: $uri,
            headers: $this->getAuthHeader(),
            body: $payload ? json_encode($payload) : null,
        );

        return retry($retryCount ?? 0, function () use ($request, $method, $payload): PromiseInterface|Response {
            if (strtolower($method) === 'post') {
                return Http::withHeaders($request->getHeaders())
                    ->post($request->getUri(), $payload);
            } else {
                return Http::withHeaders($request->getHeaders())
                    ->get($request->getUri());
            }
        }, 2000);
    }

    public function getAmazonResults(
        string $id,
        int $limit = 1,
        int $offset = 0,
    ): AmazonResults {
        try {
            $response = $this->makeRequest(
                'get',
                $this->baseUrl .= "$id/results?limit=$limit&offset=$offset",
                null,
                3,
            );
        } catch (Throwable $e) {
            throw new RuntimeException('API request failed: '.$e->getMessage(), $e->getCode(), $e);
        }

        if (! $response->successful()) {
            throw new RuntimeException('API request failed: '.$response->body(), $response->getStatusCode());
        }

        return AmazonResults::from($response->json());
    }

    public function makeBatchAmazonRequest(
        BatchRequest $batchRequest,
    ): AmazonRequestCreationResponse {
        try {
            $response = $this->makeRequest(
                'post',
                $this->baseUrl,
                $batchRequest->products,
            );
        } catch (Throwable $e) {
            throw new RuntimeException('API request failed: '.$e->getMessage(), $e->getCode(), $e);
        }

        if (! $response->successful()) {
            throw new RuntimeException('API request failed: '.$response->body(), $response->getStatusCode());
        }

        return AmazonRequestCreationResponse::from($response->json());
    }
}
