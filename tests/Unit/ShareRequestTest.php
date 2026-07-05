        <?php

        class ShareRequestTest extends TestCase
        {
            public function testShareDevice(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'ok']),
                ]);

                $response = $api->share()->deviceLocation(['deviceId' => 1]);
                $this->assertApiResponse($response);
            }

            public function testShareGroup(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'ok']),
                ]);

                $response = $api->share()->groupDevices(['groupId' => 1]);
                $this->assertApiResponse($response);
            }

            public function testShareWithExpiration(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['token' => 'share-token']),
                ]);

                $response = $api->share()->deviceLocation(['deviceId' => 1, 'expiration' => '2026-12-31']);
                $this->assertApiResponse($response);
            }

            public function testInvalidShareRequest(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(400, ['error' => 'Invalid share']),
                ]);

                $response = $api->share()->deviceLocation(['deviceId' => 999]);
                $this->assertFalse($response->isSuccessful());
            }
        }
