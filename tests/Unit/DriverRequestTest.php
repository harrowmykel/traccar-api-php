<?php

use PiccmaQ\TraccarApi\Models\DriverModel;

class DriverRequestTest extends TestCase
{
    public function testListDrivers(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Ada', 'uniqueId' => 'd1']]),
        ]);

        $response = $api->drivers()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, DriverModel::class);
    }

    public function testCreateDriver(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Grace', 'uniqueId' => 'd2']),
        ]);

        $response = $api->drivers()->create(['name' => 'Grace', 'uniqueId' => 'd2']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, DriverModel::class);
    }

    public function testGetDriver(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Grace', 'uniqueId' => 'd2']),
        ]);

        $response = $api->drivers()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, DriverModel::class);
    }

    public function testGetDriverNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->drivers()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateDriver(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Updated', 'uniqueId' => 'd2']),
        ]);

        $response = $api->drivers()->update(2, ['name' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, DriverModel::class);
    }

    public function testDeleteDriver(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->drivers()->delete(2);
        $this->assertApiResponse($response);
    }
}
