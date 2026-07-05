<?php

use PiccmaQ\TraccarApi\Models\ComputedAttributeModel;

class AttributeRequestTest extends TestCase
{
    public function testListAttributes(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'attribute' => 'custom', 'expression' => '1 + 1']]),
        ]);

        $response = $api->attributes()->computedList();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, ComputedAttributeModel::class);
    }

    public function testCreateAttribute(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'attribute' => 'custom', 'expression' => '1 + 1']),
        ]);

        $response = $api->attributes()->createComputed(['attribute' => 'custom', 'expression' => '1 + 1']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, ComputedAttributeModel::class);
    }

    public function testTestAttribute(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['result' => 'ok']),
        ]);

        $response = $api->attributes()->testComputed(['attribute' => 'custom']);
        $this->assertApiResponse($response);
    }

    public function testGetAttribute(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'attribute' => 'custom', 'expression' => '1 + 1']),
        ]);

        $response = $api->attributes()->getComputed(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, ComputedAttributeModel::class);
    }

    public function testGetAttributeNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->attributes()->getComputed(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateAttribute(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'attribute' => 'custom', 'expression' => '2 + 2']),
        ]);

        $response = $api->attributes()->updateComputed(2, ['expression' => '2 + 2']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, ComputedAttributeModel::class);
    }

    public function testDeleteAttribute(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->attributes()->deleteComputed(2);
        $this->assertApiResponse($response);
    }
}
