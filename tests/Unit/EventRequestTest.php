<?php

use PiccmaQ\TraccarApi\Models\EventModel;

class EventRequestTest extends TestCase
{
    public function testGetEvent(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 1, 'type' => 'deviceOnline', 'deviceId' => 1]),
        ]);

        $response = $api->events()->get(1);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, EventModel::class);
    }

    public function testGetEventNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->events()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testEventModel(): void
    {
        $model = new EventModel();
        $model->fromArray(['type' => 'deviceOnline', 'deviceId' => 1]);
        $this->assertSame('deviceOnline', $model->getType());
        $this->assertSame(1, $model->getDeviceId());
    }
}
