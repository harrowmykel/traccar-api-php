        <?php

        class PasswordRequestTest extends TestCase
        {
            public function testRequestPasswordReset(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'ok']),
                ]);

                $response = $api->password()->reset(['email' => 'traccar@traccar.org']);
                $this->assertApiResponse($response);
            }

            public function testUpdatePassword(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'ok']),
                ]);

                $response = $api->password()->set('token123', ['password' => 'new-password']);
                $this->assertApiResponse($response);
            }

            public function testInvalidPasswordReset(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(400, ['error' => 'Invalid email']),
                ]);

                $response = $api->password()->reset(['email' => 'invalid@example.test']);
                $this->assertFalse($response->isSuccessful());
            }
        }
