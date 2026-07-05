<?php

use PiccmaQ\TraccarApi\Models\PositionModel;

class PositionRequestTest extends TestCase
{
    public function testListPositions(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1, 'latitude' => 52.52, 'longitude' => 13.405]]),
        ]);

        $response = $api->positions()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, PositionModel::class);
    }

    public function testListPositionsWithDeviceFilter(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1, 'latitude' => 52.52, 'longitude' => 13.405]]),
        ]);

        $response = $api->positions()->list(['deviceId' => 1]);
        $this->assertApiResponse($response);
    }

    public function testListPositionsWithDateRange(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1, 'latitude' => 52.52, 'longitude' => 13.405]]),
        ]);

        $response = $api->positions()->list(['from' => '2024-01-01', 'to' => '2024-01-02']);
        $this->assertApiResponse($response);
    }

    public function testGetPosition(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 1, 'deviceId' => 1, 'latitude' => 52.52, 'longitude' => 13.405]),
        ]);

        $response = $api->positions()->list(['deviceId' => 1]);
        $this->assertApiResponse($response);
    }

    public function testGetPositionNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->positions()->deleteOne(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testExportKml(): void
    {
        $api = $this->createApiWithResponses([
            $this->createTextResponse(200, '<kml></kml>', 'application/vnd.google-earth.kml+xml'),
        ]);

        $response = $api->positions()->exportKml();
        $this->assertApiResponse($response);
        $this->assertStringContainsString('<kml>', $response->getBody());
    }

    public function testExportCsv(): void
    {
        $api = $this->createApiWithResponses([
            $this->createTextResponse(200, 'id,lat,lng\n1,52.52,13.40', 'text/csv'),
        ]);

        $response = $api->positions()->exportCsv();
        $this->assertApiResponse($response);
        $this->assertStringContainsString('lat', $response->getBody());
    }

    public function testExportGpx(): void
    {
        $api = $this->createApiWithResponses([
            $this->createTextResponse(200, '<gpx></gpx>', 'application/gpx+xml'),
        ]);

        $response = $api->positions()->exportGpx();
        $this->assertApiResponse($response);
        $this->assertStringContainsString('<gpx>', $response->getBody());
    }

    public function testDeletePosition(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->positions()->deleteOne(1);
        $this->assertApiResponse($response);
    }
}
