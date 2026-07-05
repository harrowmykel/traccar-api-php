<?php

use PiccmaQ\TraccarApi\Models\AuditActionModel;

class AuditRequestTest extends TestCase
{
    public function testGetAuditLog(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'actionType' => 'login']]),
        ]);

        $response = $api->audit()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, AuditActionModel::class);
    }

    public function testGetAuditLogWithDateRange(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'actionType' => 'login']]),
        ]);

        $response = $api->audit()->list(['from' => '2024-01-01', 'to' => '2024-01-02']);
        $this->assertApiResponse($response);
    }

    public function testUnauthenticatedAudit(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(401, ['error' => 'Unauthorized']),
        ]);

        $response = $api->audit()->list();
        $this->assertFalse($response->isSuccessful());
    }
}
