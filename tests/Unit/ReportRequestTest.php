<?php

use PiccmaQ\TraccarApi\Models\EventModel;
use PiccmaQ\TraccarApi\Models\PositionModel;
use PiccmaQ\TraccarApi\Models\ReportCombinedModel;
use PiccmaQ\TraccarApi\Models\ReportGeofenceModel;
use PiccmaQ\TraccarApi\Models\ReportStopModel;
use PiccmaQ\TraccarApi\Models\ReportSummaryModel;
use PiccmaQ\TraccarApi\Models\ReportTripModel;

class ReportRequestTest extends TestCase
{
    public function testCombinedReport(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1]]),
        ]);

        $response = $api->reports()->combined(['deviceId' => 1]);
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, ReportCombinedModel::class);
    }

    public function testRouteReport(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1, 'latitude' => 52.52, 'longitude' => 13.405]]),
        ]);

        $response = $api->reports()->route(['deviceId' => 1]);
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, PositionModel::class);
    }

    public function testEventsReport(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'type' => 'deviceOnline', 'deviceId' => 1]]),
        ]);

        $response = $api->reports()->events(['deviceId' => 1]);
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, EventModel::class);
    }

    public function testSummaryReport(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['distance' => 10.5, 'duration' => 5]]),
        ]);

        $response = $api->reports()->summary(['deviceId' => 1]);
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, ReportSummaryModel::class);
    }

    public function testTripsReport(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1]]),
        ]);

        $response = $api->reports()->trips(['deviceId' => 1]);
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, ReportTripModel::class);
    }

    public function testStopsReport(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1]]),
        ]);

        $response = $api->reports()->stops(['deviceId' => 1]);
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, ReportStopModel::class);
    }

    public function testGeofenceReport(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Home']]),
        ]);

        $response = $api->reports()->geofences(['deviceId' => 1]);
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, ReportGeofenceModel::class);
    }

    public function testDownloadRouteXlsx(): void
    {
        $api = $this->createApiWithResponses([
            $this->createTextResponse(200, 'PK\x03\x04', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'),
        ]);

        $response = $api->reports()->routeDownload('xlsx', ['deviceId' => 1]);
        $this->assertApiResponse($response);
    }

    public function testEmailRouteReport(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->reports()->routeDownload('email', ['deviceId' => 1]);
        $this->assertApiResponse($response);
    }

    public function testAcceptHeaderIsSet(): void
    {
        $container = [];
        $history = \GuzzleHttp\Middleware::history($container);
        $mock = new \GuzzleHttp\Handler\MockHandler([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1]]),
        ]);
        $stack = \GuzzleHttp\HandlerStack::create($mock);
        $stack->push($history);
        $client = new \GuzzleHttp\Client([
            'handler' => $stack,
            'http_errors' => false,
            'exceptions' => false,
        ]);
        $api = (new \PiccmaQ\TraccarApi\TraccarApi(['httpClient' => $client, 'baseUrl' => 'https://example.test/api']))->setBaseUrl('https://example.test/api');

        $api->reports()->combined(['deviceId' => 1]);

        $this->assertCount(1, $container);
        $request = $container[0]['request'];
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
    }
}

