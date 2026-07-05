<?php

use PiccmaQ\TraccarApi\Models\MaintenanceModel;

class MaintenanceRequestTest extends TestCase
{
    public function testListMaintenance(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Oil change', 'type' => 'period']]),
        ]);

        $response = $api->maintenance()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, MaintenanceModel::class);
    }

    public function testCreateMaintenance(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Tire rotation', 'type' => 'period']),
        ]);

        $response = $api->maintenance()->create(['name' => 'Tire rotation', 'type' => 'period']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, MaintenanceModel::class);
    }

    public function testGetMaintenance(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Tire rotation', 'type' => 'period']),
        ]);

        $response = $api->maintenance()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, MaintenanceModel::class);
    }

    public function testGetMaintenanceNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->maintenance()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateMaintenance(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Updated', 'type' => 'period']),
        ]);

        $response = $api->maintenance()->update(2, ['name' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, MaintenanceModel::class);
    }

    public function testDeleteMaintenance(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->maintenance()->delete(2);
        $this->assertApiResponse($response);
    }
}
