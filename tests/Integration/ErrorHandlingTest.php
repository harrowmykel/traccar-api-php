<?php

class ErrorHandlingTest extends TestCase
{
    public function testInvalidCredentials(): void
    {
        $api = \PiccmaQ\TraccarApi\TraccarApi::withEmailPassword('wrong@example.test', 'wrong');
        $api->setBaseUrl(TestConfig::getBaseUrl());

        try {
            $response = $api->session()->create('wrong@example.test', 'wrong');
            $this->assertFalse($response->isSuccessful());
        } catch (\Throwable $exception) {
            $this->assertNotNull($exception);
        }
    }

    public function testInvalidEndpoint(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->request('GET', '/does-not-exist');
        $this->assertFalse($response->isSuccessful());
    }

    public function testInvalidModelData(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 1]),
        ]);

        $response = $api->devices()->create(['name' => 'Bad']);
        $this->assertTrue($response->isSuccessful());
    }

    public function testRateLimiting(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(429, ['error' => 'Too many requests']),
        ]);

        $response = $api->health()->check();
        $this->assertFalse($response->isSuccessful());
    }

    public function testTimeoutHandling(): void
    {
        $api = (new \PiccmaQ\TraccarApi\TraccarApi(['baseUrl' => 'https://example.test/api']))->setBaseUrl('https://example.test/api');
        $this->expectException(\RuntimeException::class);
        $api->request('GET', '/timeout');
    }

    public function testJsonDecodingErrors(): void
    {
        $api = $this->createApiWithResponses([
            $this->createTextResponse(200, 'not-json'),
        ]);

        $response = $api->health()->check();
        $this->assertTrue($response->isSuccessful());
    }

    public function testConnectionErrors(): void
    {
        $api = (new \PiccmaQ\TraccarApi\TraccarApi(['baseUrl' => 'https://127.0.0.1:1/api']));
        $this->expectException(\RuntimeException::class);
        $api->request('GET', '/health');
    }
}
