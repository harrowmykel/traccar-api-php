<?php

use PiccmaQ\TraccarApi\Models\StatisticsModel;

class StatisticsRequestTest extends TestCase
{
    public function testGetStatistics(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['activeUsers' => 2, 'activeDevices' => 3, 'requests' => 10]]),
        ]);

        $response = $api->statistics()->server();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, StatisticsModel::class);
    }

    public function testGetStatisticsWithDateRange(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['activeUsers' => 2, 'activeDevices' => 3, 'requests' => 10]]),
        ]);

        $response = $api->statistics()->server();
        $this->assertApiResponse($response);
    }
}
