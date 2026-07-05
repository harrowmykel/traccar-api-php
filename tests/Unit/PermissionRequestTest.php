        <?php

        class PermissionRequestTest extends TestCase
        {
            public function testListPermissions(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, [['deviceId' => 1, 'userId' => 1]]),
                ]);

                $response = $api->permissions()->list();
                $this->assertApiResponse($response);
            }

            public function testLinkUserToDevice(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'ok']),
                ]);

                $response = $api->permissions()->link(['deviceId' => 1, 'userId' => 1]);
                $this->assertApiResponse($response);
            }

            public function testUnlinkUserFromDevice(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'ok']),
                ]);

                $response = $api->permissions()->unlink(['deviceId' => 1, 'userId' => 1]);
                $this->assertApiResponse($response);
            }

            public function testBulkLinkPermissions(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'ok']),
                ]);

                $response = $api->permissions()->bulkLink(['permissions' => [['deviceId' => 1, 'userId' => 1]]]);
                $this->assertApiResponse($response);
            }

            public function testBulkUnlinkPermissions(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'ok']),
                ]);

                $response = $api->permissions()->bulkUnlink(['permissions' => [['deviceId' => 1, 'userId' => 1]]]);
                $this->assertApiResponse($response);
            }

            public function testInvalidPermissionLink(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(400, ['error' => 'Invalid permission']),
                ]);

                $response = $api->permissions()->link(['deviceId' => 999, 'userId' => 999]);
                $this->assertFalse($response->isSuccessful());
            }
        }
