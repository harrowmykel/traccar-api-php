<?php

use PiccmaQ\TraccarApi\Models\NotificationModel;
use PiccmaQ\TraccarApi\Models\NotificationNotificatorModel;
use PiccmaQ\TraccarApi\Models\NotificationTypeModel;

class NotificationRequestTest extends TestCase
{
    public function testListNotifications(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'type' => 'alarm', 'description' => 'Test']]),
        ]);

        $response = $api->notifications()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, NotificationModel::class);
    }

    public function testCreateNotification(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'type' => 'alarm', 'description' => 'Test']),
        ]);

        $response = $api->notifications()->create(['type' => 'alarm', 'description' => 'Test']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, NotificationModel::class);
    }

    public function testGetNotification(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'type' => 'alarm', 'description' => 'Test']),
        ]);

        $response = $api->notifications()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, NotificationModel::class);
    }

    public function testGetNotificationNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->notifications()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateNotification(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'type' => 'alarm', 'description' => 'Updated']),
        ]);

        $response = $api->notifications()->update(2, ['description' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, NotificationModel::class);
    }

    public function testDeleteNotification(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->notifications()->delete(2);
        $this->assertApiResponse($response);
    }

    public function testGetNotificationTypes(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['type' => 'alarm']]),
        ]);

        $response = $api->notifications()->types();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, NotificationTypeModel::class);
    }

    public function testGetNotificators(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['type' => 'web']]),
        ]);

        $response = $api->notifications()->notificators();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, NotificationNotificatorModel::class);
    }

    public function testSendTestNotification(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->notifications()->test(['type' => 'alarm']);
        $this->assertApiResponse($response);
    }

    public function testSendCustomNotification(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->notifications()->send('web', ['message' => 'Hello']);
        $this->assertApiResponse($response);
    }
}
