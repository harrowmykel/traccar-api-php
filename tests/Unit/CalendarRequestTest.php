<?php

use PiccmaQ\TraccarApi\Models\CalendarModel;

class CalendarRequestTest extends TestCase
{
    public function testListCalendars(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, [['id' => 1, 'name' => 'Holiday', 'data' => 'BEGIN:VCALENDAR']]),
        ]);

        $response = $api->calendars()->list();
        $this->assertApiResponse($response);
        $this->assertTrue(count($response->getStructuredBody()) > 0);
        $this->assertIsCollectionOf($response, CalendarModel::class);
    }

    public function testCreateCalendar(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Vacation', 'data' => 'BEGIN:VCALENDAR']),
        ]);

        $response = $api->calendars()->create(['name' => 'Vacation', 'data' => 'BEGIN:VCALENDAR']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, CalendarModel::class);
    }

    public function testGetCalendar(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Vacation', 'data' => 'BEGIN:VCALENDAR']),
        ]);

        $response = $api->calendars()->get(2);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, CalendarModel::class);
    }

    public function testGetCalendarNotFound(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(404, ['error' => 'Not found']),
        ]);

        $response = $api->calendars()->get(999);
        $this->assertFalse($response->isSuccessful());
    }

    public function testUpdateCalendar(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['id' => 2, 'name' => 'Updated', 'data' => 'BEGIN:VCALENDAR']),
        ]);

        $response = $api->calendars()->update(2, ['name' => 'Updated']);
        $this->assertApiResponse($response);

        $this->assertIsInt($response->getStructuredBody()->getId());
        $this->assertNotNull($response->getStructuredBody()->getId());
        $this->assertModelInstance($response, CalendarModel::class);
    }

    public function testDeleteCalendar(): void
    {
        $api = $this->createApiWithResponses([
            $this->createJsonResponse(200, ['status' => 'ok']),
        ]);

        $response = $api->calendars()->delete(2);
        $this->assertApiResponse($response);
    }
}
