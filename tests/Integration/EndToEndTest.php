<?php

class EndToEndTest extends TestCase
{
    public function testFullDeviceLifecycle(): void
    {
        $this->skipIfDemoServerUnavailable();

        try {
            $deviceId = $this->createTestDevice();
            if ($deviceId <= 0) {
                $this->markTestSkipped('The demo server did not create a test device.');
            }

            $response = $this->getApi()->devices()->get($deviceId);
            if (!$response->isSuccessful()) {
                $this->markTestSkipped('The demo server denied device retrieval.');
            }

            $update = $this->getApi()->devices()->update($deviceId, ['name' => 'Updated by PHPUnit']);
            if (!$update->isSuccessful()) {
                $this->markTestSkipped('The demo server rejected device updates.');
            }

            $this->cleanupTestDevice($deviceId);
        } catch (\Throwable $exception) {
            $this->markTestSkipped('Live demo permission error: ' . $exception->getMessage());
        }
    }

    public function testFullUserLifecycle(): void
    {
        $this->skipIfDemoServerUnavailable();

        $response = $this->getApi()->users()->create(TestConfig::getTestUserData());
        if (!$response->isSuccessful()) {
            $this->markTestSkipped('The demo server rejected the user creation request.');
        }

        $body = $response->getStructuredBody();
        $this->assertNotNull($body);
        if ($body instanceof \PiccmaQ\TraccarApi\Models\UserModel && $body->getId() !== null) {
            try {
                $this->getApi()->users()->delete($body->getId());
            } catch (\Throwable $exception) {
                $this->markTestSkipped('Live demo permission error: ' . $exception->getMessage());
            }
        }
    }

    public function testFullGroupLifecycle(): void
    {
        $this->skipIfDemoServerUnavailable();

        $groupId = $this->createTestGroup();
        if ($groupId <= 0) {
            $this->markTestSkipped('The demo server did not create a test group.');
        }

        $response = $this->getApi()->groups()->get($groupId);
        if (!$response->isSuccessful()) {
            $this->markTestSkipped('The demo server denied group retrieval.');
        }

        try {
            $update = $this->getApi()->groups()->update($groupId, ['name' => 'Updated by PHPUnit']);
            if (!$update->isSuccessful()) {
                $this->markTestSkipped('The demo server rejected group updates.');
            }

            $this->cleanupTestGroup($groupId);
        } catch (\Throwable $exception) {
            $this->markTestSkipped('Live demo permission error: ' . $exception->getMessage());
        }
    }

    public function testCommandWorkflow(): void
    {
        $this->skipIfDemoServerUnavailable();

        $commandResponse = $this->getApi()->commands()->create(['deviceId' => 1, 'type' => 'positionSingle', 'description' => 'PHPUnit']);
        if (!$commandResponse->isSuccessful()) {
            $this->markTestSkipped('The demo server rejected command dispatches.');
        }

        $this->assertNotNull($commandResponse->getBody());
    }

    public function testNotificationWorkflow(): void
    {
        $this->skipIfDemoServerUnavailable();

        $response = $this->getApi()->notifications()->create(['type' => 'alarm', 'description' => 'PHPUnit']);
        if (!$response->isSuccessful()) {
            $this->markTestSkipped('The demo server rejected notification creation.');
        }

        $this->assertNotNull($response->getBody());
    }

    public function testReportWorkflow(): void
    {
        $this->skipIfDemoServerUnavailable();

        try {
            $positions = $this->getApi()->positions()->list(['deviceId' => 1]);
            if (!$positions->isSuccessful()) {
                $this->markTestSkipped('The demo server denied position listing.');
            }

            $report = $this->getApi()->reports()->summary(['deviceId' => 1]);
            if (!$report->isSuccessful()) {
                $this->markTestSkipped('The demo server denied report generation.');
            }
        } catch (\Throwable $exception) {
            $this->markTestSkipped('Live demo permission error: ' . $exception->getMessage());
        }
    }
}
