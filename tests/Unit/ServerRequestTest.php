<?php

use PiccmaQ\TraccarApi\Models\ServerModel;

class ServerRequestTest extends TestCase
{
    public function testGetServerInfo(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 1, 'registration' => true, 'version' => '5.10']),
        ]);

        $response = $api->server()->info();
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, ServerModel::class);
        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertSame(1, $response->getStructuredBody()->getId());
    }

    public function testUpdateServerInfo(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 1, 'registration' => false, 'version' => '5.10']),
        ]);

        $response = $api->server()->update(['registration' => false]);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, ServerModel::class);
    }

    public function testGetTimezones(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['name' => 'Europe/Berlin']]),
        ]);

        $response = $api->server()->timezones();
        $this->assertApiResponse($response);
        $this->assertSame([['name' => 'Europe/Berlin']], $response->toArray());
    }

    public function testGeocode(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['address' => 'Berlin']),
        ]);

        $response = $api->server()->geocode(52.52, 13.405);
        $this->assertApiResponse($response);
        $this->assertSame('Berlin', $response->toArray()['address']);
    }

    public function testGeocodeUnauthenticated(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(401, ['error' => 'Unauthorized']),
        ]);

        $response = $api->server()->geocode(52.52, 13.405);
        $this->assertFalse($response->isSuccessful());
    }

    public function testGetCacheDiagnostics(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->server()->cache();
        $this->assertApiResponse($response);
    }

    public function testTriggerGarbageCollection(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->server()->gc();
        $this->assertApiResponse($response);
    }

    public function testRebootServer(): void
    {
        $this->markTestSkipped('Rebooting the server is intentionally skipped in this automated suite.');
    }
}
