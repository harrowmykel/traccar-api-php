<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PiccmaQ\TraccarApi\Models\DeviceModel;
use PiccmaQ\TraccarApi\Models\GroupModel;
use PiccmaQ\TraccarApi\TraccarApi;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected TraccarApi $api;
    protected TraccarApi $unauthenticatedApi;

    protected function setUp(): void
    {
        $this->api = TraccarApi::withEmailPassword(TestConfig::getEmail(), TestConfig::getPassword());
        $this->api->setBaseUrl(TestConfig::getBaseUrl());

        $this->unauthenticatedApi = TraccarApi::noAuth();
        $this->unauthenticatedApi->setBaseUrl(TestConfig::getBaseUrl());
    }

    protected function getApi(): TraccarApi
    {
        return $this->api;
    }

    protected function getUnauthenticatedApi(): TraccarApi
    {
        return $this->unauthenticatedApi;
    }

    protected function createApiWithResponses(array $responses): TraccarApi
    {
        $mock = new MockHandler($responses);
        $stack = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $stack,
            'http_errors' => false,
            'exceptions' => false,
        ]);

        return (new TraccarApi(['httpClient' => $client, 'baseUrl' => 'https://example.test/api']))->setBaseUrl('https://example.test/api');
    }

    protected function createJsonResponse(int $status, array $payload): Response
    {
        return new Response($status, ['Content-Type' => 'application/json'], json_encode($payload));
    }

    protected function createTextResponse(int $status, string $body, string $contentType = 'text/plain'): Response
    {
        return new Response($status, ['Content-Type' => $contentType], $body);
    }

    protected function assertApiResponse($response, int $expectedStatus = 200): void
    {
        $this->assertNotNull($response);
        $this->assertSame($expectedStatus, $response->getStatusCode());
        $this->assertTrue($response->isSuccessful());
    }

    protected function assertHasStructuredBody($response): void
    {
        $this->assertTrue($response->hasStructuredBody());
        $this->assertNotNull($response->getStructuredBody());
    }

    protected function assertModelInstance($response, string $expectedClass): void
    {
        $this->assertHasStructuredBody($response);
        $this->assertInstanceOf($expectedClass, $response->getStructuredBody());
    }

    protected function assertIsCollectionOf($response, string $expectedClass): void
    {
        $this->assertHasStructuredBody($response);
        $this->assertIsArray($response->getStructuredBody());
        foreach ($response->getStructuredBody() as $item) {
            $this->assertInstanceOf($expectedClass, $item);
        }
    }

    protected function createTestDevice(): int
    {
        try {
            $response = $this->getApi()->devices()->create(TestConfig::getTestDeviceData());
            if (!$response->isSuccessful() || !$response->hasStructuredBody()) {
                $this->markTestSkipped('Unable to create test device on the demo server.');
            }

            $body = $response->getStructuredBody();
            if ($body instanceof DeviceModel && $body->getId() !== null) {
                return $body->getId();
            }
        } catch (\Throwable $exception) {
            $this->markTestSkipped('Demo server unavailable: ' . $exception->getMessage());
        }

        return 0;
    }

    protected function createTestGroup(): int
    {
        try {
            $response = $this->getApi()->groups()->create(TestConfig::getTestGroupData());
            if (!$response->isSuccessful() || !$response->hasStructuredBody()) {
                $this->markTestSkipped('Unable to create test group on the demo server.');
            }

            $body = $response->getStructuredBody();
            if ($body instanceof GroupModel && $body->getId() !== null) {
                return $body->getId();
            }
        } catch (\Throwable $exception) {
            $this->markTestSkipped('Demo server unavailable: ' . $exception->getMessage());
        }

        return 0;
    }

    protected function cleanupTestDevice(int $id): void
    {
        if ($id <= 0) {
            return;
        }

        try {
            $this->getApi()->devices()->delete($id);
        } catch (\Throwable $exception) {
            // Ignore cleanup failures.
        }
    }

    protected function cleanupTestGroup(int $id): void
    {
        if ($id <= 0) {
            return;
        }

        try {
            $this->getApi()->groups()->delete($id);
        } catch (\Throwable $exception) {
            // Ignore cleanup failures.
        }
    }

    protected function skipIfDemoServerUnavailable(): void
    {
        try {
            $response = $this->getApi()->health()->check();
            if (!$response->isSuccessful()) {
                $this->markTestSkipped('Demo server returned an unsuccessful health check.');
            }
        } catch (\Throwable $exception) {
            $this->markTestSkipped('Demo server unavailable: ' . $exception->getMessage());
        }
    }
}
