<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\CalendarModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Calendars resource.
 *
 * Provides access to all `/calendars` endpoints of the Traccar API. Calendars
 * define recurring time windows in iCalendar (iCal) format and can be assigned
 * to geofences or notifications to restrict when those rules are active.
 *
 * @see https://www.traccar.org/api-reference/#tag/Calendars
 */
class CalendarRequest extends Request
{
    /**
     * Fetch a list of Calendars.
     *
     * `GET /calendars`
     *
     * Returns all calendars visible to the authenticated user.
     *
     * @param array{
     *     all?:    bool,
     *     userId?: int,
     * } $query Optional query parameters:
     *   - `all`    – Return all calendars (admin only).
     *   - `userId` – Filter by user.
     *
     * @return ApiResponse Response whose structured body is a {@see CalendarModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(CalendarModel::class, true)->requestGet('/calendars', $query);
    }

    /**
     * Create a Calendar.
     *
     * `POST /calendars`
     *
     * @param array{
     *     name:        string,
     *     data:        string,
     *     attributes?: array<string, mixed>,
     * } $data Calendar data. `name` and `data` are required.
     *   - `data` – Base64-encoded iCalendar (`.ics`) content defining the recurring schedule.
     *
     * @return ApiResponse Response whose structured body is the created {@see CalendarModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(CalendarModel::class)->requestPost('/calendars', $data);
    }

    /**
     * Fetch a Calendar.
     *
     * `GET /calendars/{id}`
     *
     * @param int $id The unique calendar identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see CalendarModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(CalendarModel::class)->requestGet('/calendars/' . $id);
    }

    /**
     * Update a Calendar.
     *
     * `PUT /calendars/{id}`
     *
     * @param int                  $id   The unique calendar identifier.
     * @param array<string, mixed> $data Calendar fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see CalendarModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(CalendarModel::class)->requestPut('/calendars/' . $id, $data);
    }

    /**
     * Delete a Calendar.
     *
     * `DELETE /calendars/{id}`
     *
     * @param int $id The unique calendar identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/calendars/' . $id);
    }
}
