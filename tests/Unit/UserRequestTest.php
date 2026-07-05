<?php

use PiccmaQ\TraccarApi\Models\UserModel;

class UserRequestTest extends TestCase
{
    public function testListUsers(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Admin', 'email' => 'admin@example.test']]),
        ]);

        $response = $api->users()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, UserModel::class);
    }

    public function testListUsersWithFilter(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Admin', 'email' => 'admin@example.test']]),
        ]);

        $response = $api->users()->list(['userId' => 1]);
        $this->assertApiResponse($response);
    }

    public function testCreateUser(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'New User', 'email' => 'new@example.test']),
        ]);

        $response = $api->users()->create(TestConfig::getTestUserData());
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, UserModel::class);
    }

    public function testGetUser(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'New User', 'email' => 'new@example.test']),
        ]);

        $response = $api->users()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, UserModel::class);
    }

    public function testGetUserNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->users()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateUser(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Updated', 'email' => 'new@example.test']),
        ]);

        $response = $api->users()->update(2, ['name' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, UserModel::class);
    }

    public function testDeleteUser(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->users()->delete(2);
        $this->assertApiResponse($response);
    }

    public function testGenerateTotpSecret(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->users()->totp();
        $this->assertApiResponse($response);
    }
}
