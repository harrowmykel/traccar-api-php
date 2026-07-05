<?php

use PiccmaQ\TraccarApi\Models\OrderModel;

class OrderRequestTest extends TestCase
{
    public function testListOrders(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'description' => 'Pickup', 'uniqueId' => 'o1']]),
        ]);

        $response = $api->orders()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, OrderModel::class);
    }

    public function testCreateOrder(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'description' => 'Delivery', 'uniqueId' => 'o2']),
        ]);

        $response = $api->orders()->create(['description' => 'Delivery', 'uniqueId' => 'o2']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, OrderModel::class);
    }

    public function testGetOrder(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'description' => 'Delivery', 'uniqueId' => 'o2']),
        ]);

        $response = $api->orders()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, OrderModel::class);
    }

    public function testGetOrderNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->orders()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateOrder(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'description' => 'Updated', 'uniqueId' => 'o2']),
        ]);

        $response = $api->orders()->update(2, ['description' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, OrderModel::class);
    }

    public function testDeleteOrder(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->orders()->delete(2);
        $this->assertApiResponse($response);
    }
}
