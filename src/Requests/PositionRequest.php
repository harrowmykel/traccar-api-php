<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\PositionModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Positions resource.
 *
 * Provides access to all `/positions` endpoints of the Traccar API, including
 * querying, deleting, and exporting position data in various formats (KML, CSV, GPX).
 *
 * @see https://www.traccar.org/api-reference/#tag/Positions
 */
class PositionRequest extends Request
{
    /**
     * Fetch a list of Positions.
     *
     * `GET /positions`
     *
     * Returns device positions matching the given filters. Without a time range,
     * only the latest position for each requested device is returned.
     *
     * @param array{
     *     deviceId?: int,
     *     id?:       int,
     *     from?:     string,
     *     to?:       string,
     * } $query Optional query parameters:
     *   - `deviceId` – Filter positions by device.
     *   - `id`       – Return a specific position by ID.
     *   - `from`     – Start of the time range (ISO 8601, e.g. `'2026-01-01T00:00:00Z'`).
     *   - `to`       – End of the time range (ISO 8601).
     *
     * @return ApiResponse Response whose structured body is a {@see PositionModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(PositionModel::class, true)->requestGet('/positions', $query);
    }

    /**
     * Delete all Positions of a Device within a time span.
     *
     * `DELETE /positions`
     *
     * Permanently removes all position records for the specified device within
     * the given time range.
     *
     * @param array{
     *     deviceId: int,
     *     from:     string,
     *     to:       string,
     * } $query Required query parameters (deviceId, from, to).
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function deleteByDevice(array $query = []): ApiResponse
    {
        return $this->requestDelete('/positions', $query);
    }

    /**
     * Delete a single Position.
     *
     * `DELETE /positions/{id}`
     *
     * @param int $id The unique position identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function deleteOne(int $id): ApiResponse
    {
        return $this->requestDelete('/positions/' . $id);
    }

    /**
     * Export Positions as KML.
     *
     * `GET /positions/kml`
     *
     * Returns position data in Keyhole Markup Language (KML) format, suitable
     * for import into Google Earth or similar tools.
     *
     * @param array{
     *     deviceId?: int,
     *     from?:     string,
     *     to?:       string,
     * } $query Optional filter parameters (same as {@see list()}).
     *
     * @return ApiResponse Response body contains the raw KML document.
     */
    public function exportKml(array $query = []): ApiResponse
    {
        return $this->requestGet('/positions/kml', $query);
    }

    /**
     * Export Positions as CSV.
     *
     * `GET /positions/csv`
     *
     * Returns position data as a comma-separated values document.
     *
     * @param array{
     *     deviceId?: int,
     *     from?:     string,
     *     to?:       string,
     * } $query Optional filter parameters (same as {@see list()}).
     *
     * @return ApiResponse Response body contains the raw CSV document.
     */
    public function exportCsv(array $query = []): ApiResponse
    {
        return $this->requestGet('/positions/csv', $query);
    }

    /**
     * Export Positions as GPX.
     *
     * `GET /positions/gpx`
     *
     * Returns position data in GPS Exchange Format (GPX), compatible with most
     * mapping and navigation software.
     *
     * @param array{
     *     deviceId?: int,
     *     from?:     string,
     *     to?:       string,
     * } $query Optional filter parameters (same as {@see list()}).
     *
     * @return ApiResponse Response body contains the raw GPX document.
     */
    public function exportGpx(array $query = []): ApiResponse
    {
        return $this->requestGet('/positions/gpx', $query);
    }
}
