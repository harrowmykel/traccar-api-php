<?php

use PiccmaQ\TraccarApi\Models\GeofenceModel;

class GeofenceRequestTest extends TestCase
{
    public function testListGeofences(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Home', 'area' => 'POLYGON((1 1, 1 2, 2 2, 2 1, 1 1))']]),
        ]);

        $response = $api->geofences()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, GeofenceModel::class);
    }

    public function testCreateGeofence(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Work', 'area' => 'POLYGON((1 1, 1 2, 2 2, 2 1, 1 1))']),
        ]);

        $response = $api->geofences()->create(['name' => 'Work', 'area' => 'POLYGON((1 1, 1 2, 2 2, 2 1, 1 1))']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, GeofenceModel::class);
    }

    public function testGetGeofence(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Work', 'area' => 'POLYGON((1 1, 1 2, 2 2, 2 1, 1 1))']),
        ]);

        $response = $api->geofences()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, GeofenceModel::class);
    }

    public function testGetGeofenceNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->geofences()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateGeofence(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Updated', 'area' => 'POLYGON((1 1, 1 2, 2 2, 2 1, 1 1))']),
        ]);

        $response = $api->geofences()->update(2, ['name' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, GeofenceModel::class);
    }

    public function testDeleteGeofence(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->geofences()->delete(2);
        $this->assertApiResponse($response);
    }
}
