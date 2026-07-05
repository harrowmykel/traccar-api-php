<?php

use PiccmaQ\TraccarApi\Models\CommandModel;
use PiccmaQ\TraccarApi\Models\CommandTypeModel;

class CommandRequestTest extends TestCase
{
    public function testListCommands(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'deviceId' => 1, 'type' => 'positionSingle']]),
        ]);

        $response = $api->commands()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, CommandModel::class);
    }

    public function testCreateCommand(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'deviceId' => 1, 'type' => 'positionSingle']),
        ]);

        $response = $api->commands()->create(['deviceId' => 1, 'type' => 'positionSingle']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, CommandModel::class);
    }

    public function testGetCommand(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'deviceId' => 1, 'type' => 'positionSingle']),
        ]);

        $response = $api->commands()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, CommandModel::class);
    }

    public function testGetCommandNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->commands()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateCommand(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'deviceId' => 1, 'type' => 'positionSingle']),
        ]);

        $response = $api->commands()->update(2, ['description' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, CommandModel::class);
    }

    public function testDeleteCommand(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->commands()->delete(2);
        $this->assertApiResponse($response);
    }

    public function testGetSupportedCommands(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['type' => 'positionSingle']]),
        ]);

        $response = $api->commands()->types();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, CommandTypeModel::class);
    }

    public function testSendCommand(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->commands()->dispatch(['deviceId' => 1, 'type' => 'positionSingle']);
        $this->assertApiResponse($response);
    }

    public function testGetCommandTypes(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['type' => 'positionSingle']]),
        ]);

        $response = $api->commands()->types();
        $this->assertApiResponse($response);
    }
}
