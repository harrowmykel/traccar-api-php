<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\EventModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Events resource.
 *
 * Provides access to the `/events` endpoint of the Traccar API. Individual
 * events (geofence entry/exit, device status changes, alarms, etc.) can be
 * fetched by their unique identifier. Event collections are available through
 * {@see ReportRequest::events()}.
 *
 * @see https://www.traccar.org/api-reference/#tag/Events
 */
class EventRequest extends Request
{
    /**
     * Fetch an Event.
     *
     * `GET /events/{id}`
     *
     * Retrieves a single event by its unique identifier.
     *
     * @param int $id The unique event identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see EventModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(EventModel::class)->requestGet('/events/' . $id);
    }
}
