<?php

use PiccmaQ\TraccarApi\Models\UserModel;

class SessionRequestTest extends TestCase
{
    public function testCreateSession(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['token' => 'abc123', 'id' => 1, 'name' => 'Demo']),
        ]);

        $response = $api->session()->create('traccar@traccar.org', 'traccar');
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, UserModel::class);
    }

    public function testGetSession(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 1, 'name' => 'Demo']),
        ]);

        $response = $api->session()->info();
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, UserModel::class);
    }

    public function testGetSessionWithToken(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 1, 'name' => 'Demo']),
        ]);

        $response = $api->session()->info();
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, UserModel::class);
    }

    public function testGenerateToken(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['token' => 'jwt-token']),
        ]);

        $response = $api->session()->generateToken();
        $this->assertApiResponse($response);
        $this->assertSame('jwt-token', $response->toArray()['token']);
    }

    public function testGenerateTokenWithExpiration(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['token' => 'jwt-token-expiring']),
        ]);

        $response = $api->session()->generateToken('2026-12-31T00:00:00Z');
        $this->assertApiResponse($response);
        $this->assertSame('jwt-token-expiring', $response->toArray()['token']);
    }

    public function testRevokeToken(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->session()->revokeToken('jwt-token');
        $this->assertApiResponse($response);
    }

    public function testDeleteSession(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->session()->close();
        $this->assertApiResponse($response);
    }

    public function testSessionExpiration(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(401, ['error' => 'Token expired']),
        ]);

        $response = $api->session()->info();
        $this->assertFalse($response->isSuccessful());
    }
}
