<?php

use PiccmaQ\TraccarApi\Models\GroupModel;

class GroupRequestTest extends TestCase
{
    public function testListGroups(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Admin']]),
        ]);

        $response = $api->groups()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, GroupModel::class);
    }

    public function testListGroupsWithPagination(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Admin']]),
        ]);

        $response = $api->groups()->list(['limit' => 1, 'offset' => 0]);
        $this->assertApiResponse($response);
    }

    public function testCreateGroup(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Team']),
        ]);

        $response = $api->groups()->create(TestConfig::getTestGroupData());
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, GroupModel::class);
    }

    public function testGetGroup(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Team']),
        ]);

        $response = $api->groups()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, GroupModel::class);
    }

    public function testGetGroupNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->groups()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateGroup(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Updated']),
        ]);

        $response = $api->groups()->update(2, ['name' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, GroupModel::class);
    }

    public function testDeleteGroup(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->groups()->delete(2);
        $this->assertApiResponse($response);
    }

    public function testGroupHierarchy(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Child', 'groupId' => 1]),
        ]);

        $response = $api->groups()->create(['name' => 'Child', 'groupId' => 1]);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, GroupModel::class);
    }
}
