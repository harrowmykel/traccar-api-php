<?php

use PiccmaQ\TraccarApi\Models\DeviceModel;

class DeviceRequestTest extends TestCase
{
    public function testListDevices(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Alpha', 'uniqueId' => 'u1']]),
        ]);

        $response = $api->devices()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, DeviceModel::class);
    }

    public function testListDevicesWithPagination(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Alpha', 'uniqueId' => 'u1']]),
        ]);

        $response = $api->devices()->list(['limit' => 1, 'offset' => 0]);
        $this->assertApiResponse($response);
    }

    public function testListDevicesWithSearch(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Alpha', 'uniqueId' => 'u1']]),
        ]);

        $response = $api->devices()->list(['search' => 'Alpha']);
        $this->assertApiResponse($response);
    }

    public function testListDevicesWithFilter(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Alpha', 'uniqueId' => 'u1']]),
        ]);

        $response = $api->devices()->list(['userId' => 1, 'groupId' => 1]);
        $this->assertApiResponse($response);
    }

    public function testCreateDevice(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Beta', 'uniqueId' => 'u2']),
        ]);

        $response = $api->devices()->create(TestConfig::getTestDeviceData());
        $this->assertApiResponse($response);
        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, DeviceModel::class);
    }

    public function testGetDevice(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Beta', 'uniqueId' => 'u2']),
        ]);

        $response = $api->devices()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, DeviceModel::class);
    }

    public function testGetDeviceNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->devices()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateDevice(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Updated', 'uniqueId' => 'u2']),
        ]);

        $response = $api->devices()->update(2, ['name' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, DeviceModel::class);
    }

    public function testDeleteDevice(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->devices()->delete(2);
        $this->assertApiResponse($response);
    }

    public function testUploadDeviceImage(): void
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'traccar');
        file_put_contents($tempFile, 'fake-image');
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->devices()->uploadImage(2, $tempFile);
        $this->assertApiResponse($response);
        unlink($tempFile);
    }

    public function testUpdateDeviceAccumulators(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->devices()->updateAccumulators(2, ['distance' => 5]);
        $this->assertApiResponse($response);
    }

    public function testDeviceModelMethods(): void
    {
        $model = new DeviceModel();
        $model->fromArray(['name' => 'Alpha', 'uniqueId' => 'u1']);
        $this->assertSame('Alpha', $model->getName());
        $this->assertSame('u1', $model->getUniqueId());
    }
}
