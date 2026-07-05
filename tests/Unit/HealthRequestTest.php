        <?php

        class HealthRequestTest extends TestCase
        {
            public function testHealthCheck(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createJsonResponse(200, ['status' => 'OK']),
                ]);

                $response = $api->health()->check();
                $this->assertApiResponse($response);
            }

            public function testHealthCheckReturnsOk(): void
            {
                $api = $this->createApiWithResponses([
                    $this->createTextResponse(200, 'OK'),
                ]);

                $response = $api->health()->check();
                $this->assertApiResponse($response);
                $this->assertSame('OK', $response->getBody());
            }
        }
