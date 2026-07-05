<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\EventModel;
use PiccmaQ\TraccarApi\Models\PositionModel;
use PiccmaQ\TraccarApi\Models\ReportCombinedModel;
use PiccmaQ\TraccarApi\Models\ReportGeofenceModel;
use PiccmaQ\TraccarApi\Models\ReportStopModel;
use PiccmaQ\TraccarApi\Models\ReportSummaryModel;
use PiccmaQ\TraccarApi\Models\ReportTripModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Reports resource.
 *
 * Provides access to all `/reports` endpoints of the Traccar API. All report
 * queries accept a time range (`from` / `to` in ISO 8601 format) and one or
 * more device or group IDs.
 *
 * Download endpoints accept a `$type` parameter which may be `'xlsx'` for a
 * spreadsheet or `'mail'` to have the report emailed to the authenticated user.
 *
 * @see https://www.traccar.org/api-reference/#tag/Reports
 */
class ReportRequest extends Request
{
    /**
     * Fetch a combined route, Events and Positions report.
     *
     * `GET /reports/combined`
     *
     * Returns a combined dataset for the given devices or groups over the
     * specified time range, containing position and event records interleaved
     * in chronological order.
     *
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Response whose structured body is a {@see ReportCombinedModel}[].
     */
    public function combined(array $query = []): ApiResponse
    {
        return $this->expectModel(ReportCombinedModel::class, true)->requestGet('/reports/combined', $query);
    }

    /**
     * Fetch a list of Positions within the time period (route report).
     *
     * `GET /reports/route`
     *
     * Returns all recorded positions for the specified devices or groups within
     * the given time range, forming the raw route data.
     *
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Response whose structured body is a {@see PositionModel}[].
     */
    public function route(array $query = []): ApiResponse
    {
        return $this->expectModel(PositionModel::class, true)->requestGet('/reports/route', $query);
    }

    /**
     * Download the route report as a spreadsheet or send it by email.
     *
     * `GET /reports/route/{type}`
     *
     * @param string $type   Export format: `'xlsx'` for spreadsheet or `'mail'` to send by email.
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Raw binary response (xlsx) or empty response (mail).
     */
    public function routeDownload(string $type, array $query = []): ApiResponse
    {
        return $this->requestGet('/reports/route/' . $type, $query);
    }

    /**
     * Fetch a list of Events within the time period.
     *
     * `GET /reports/events`
     *
     * Returns all events (alarms, geofence transitions, status changes, etc.)
     * for the specified devices or groups within the given time range.
     *
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     type?:      string[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *   - `type` – Restrict to specific event types (e.g. `['geofenceEnter', 'alarm']`).
     *
     * @return ApiResponse Response whose structured body is an {@see EventModel}[].
     */
    public function events(array $query = []): ApiResponse
    {
        return $this->expectModel(EventModel::class, true)->requestGet('/reports/events', $query);
    }

    /**
     * Download the events report as a spreadsheet or send it by email.
     *
     * `GET /reports/events/{type}`
     *
     * @param string $type   Export format: `'xlsx'` or `'mail'`.
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     type?:      string[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Raw binary response (xlsx) or empty response (mail).
     */
    public function eventsDownload(string $type, array $query = []): ApiResponse
    {
        return $this->requestGet('/reports/events/' . $type, $query);
    }

    /**
     * Fetch geofence enter/exit intervals within the time period.
     *
     * `GET /reports/geofences`
     *
     * Returns time intervals during which devices entered or exited configured
     * geofences, within the given time range.
     *
     * @param array{
     *     deviceId?:   int[],
     *     groupId?:    int[],
     *     geofenceId?: int[],
     *     from:        string,
     *     to:          string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Response whose structured body is a {@see ReportGeofenceModel}[].
     */
    public function geofences(array $query = []): ApiResponse
    {
        return $this->expectModel(ReportGeofenceModel::class, true)->requestGet('/reports/geofences', $query);
    }

    /**
     * Fetch a list of ReportSummary records within the time period.
     *
     * `GET /reports/summary`
     *
     * Returns aggregated statistics per device (distance driven, engine hours,
     * average/max speed, etc.) over the specified time range.
     *
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     daily?:     bool,
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *   - `daily` – When `true`, break the summary into daily intervals.
     *
     * @return ApiResponse Response whose structured body is a {@see ReportSummaryModel}[].
     */
    public function summary(array $query = []): ApiResponse
    {
        return $this->expectModel(ReportSummaryModel::class, true)->requestGet('/reports/summary', $query);
    }

    /**
     * Download the summary report as a spreadsheet or send it by email.
     *
     * `GET /reports/summary/{type}`
     *
     * @param string $type   Export format: `'xlsx'` or `'mail'`.
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Raw binary response (xlsx) or empty response (mail).
     */
    public function summaryDownload(string $type, array $query = []): ApiResponse
    {
        return $this->requestGet('/reports/summary/' . $type, $query);
    }

    /**
     * Fetch a list of ReportTrips within the time period.
     *
     * `GET /reports/trips`
     *
     * Returns individual trip records (start/end location, duration, distance,
     * average/max speed) for the specified devices or groups.
     *
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Response whose structured body is a {@see ReportTripModel}[].
     */
    public function trips(array $query = []): ApiResponse
    {
        return $this->expectModel(ReportTripModel::class, true)->requestGet('/reports/trips', $query);
    }

    /**
     * Download the trips report as a spreadsheet or send it by email.
     *
     * `GET /reports/trips/{type}`
     *
     * @param string $type   Export format: `'xlsx'` or `'mail'`.
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Raw binary response (xlsx) or empty response (mail).
     */
    public function tripsDownload(string $type, array $query = []): ApiResponse
    {
        return $this->requestGet('/reports/trips/' . $type, $query);
    }

    /**
     * Fetch a list of ReportStops within the time period.
     *
     * `GET /reports/stops`
     *
     * Returns stop records (locations where a device was stationary, with
     * duration and address) for the specified devices or groups.
     *
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Response whose structured body is a {@see ReportStopModel}[].
     */
    public function stops(array $query = []): ApiResponse
    {
        return $this->expectModel(ReportStopModel::class, true)->requestGet('/reports/stops', $query);
    }

    /**
     * Download the stops report as a spreadsheet or send it by email.
     *
     * `GET /reports/stops/{type}`
     *
     * @param string $type   Export format: `'xlsx'` or `'mail'`.
     * @param array{
     *     deviceId?:  int[],
     *     groupId?:   int[],
     *     from:       string,
     *     to:         string,
     * } $query Query parameters. `from` and `to` are required.
     *
     * @return ApiResponse Raw binary response (xlsx) or empty response (mail).
     */
    public function stopsDownload(string $type, array $query = []): ApiResponse
    {
        return $this->requestGet('/reports/stops/' . $type, $query);
    }

    /**
     * Download the devices report as a spreadsheet or send it by email.
     *
     * `GET /reports/devices/{type}`
     *
     * Generates a report listing all devices visible to the authenticated user.
     *
     * @param string $type   Export format: `'xlsx'` or `'mail'`.
     * @param array<string, mixed> $query Optional filter parameters.
     *
     * @return ApiResponse Raw binary response (xlsx) or empty response (mail).
     */
    public function devicesDownload(string $type, array $query = []): ApiResponse
    {
        return $this->requestGet('/reports/devices/' . $type, $query);
    }
}
