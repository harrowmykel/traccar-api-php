<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\GeofenceModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Geofences resource.
 *
 * Provides access to all `/geofences` endpoints of the Traccar API. Geofences
 * are geographic boundary definitions (circles, polygons) that trigger events
 * when a tracked device enters or exits them.
 *
 * @see https://www.traccar.org/api-reference/#tag/Geofences
 */
class GeofenceRequest extends Request
{
    /**
     * Fetch a list of Geofences.
     *
     * `GET /geofences`
     *
     * Returns all geofences visible to the authenticated user.
     *
     * @param array{
     *     all?:      bool,
     *     userId?:   int,
     *     deviceId?: int,
     *     groupId?:  int,
     *     refresh?:  bool,
     * } $query Optional query parameters:
     *   - `all`      – Return all geofences (admin only).
     *   - `userId`   – Filter by user.
     *   - `deviceId` – Filter by device.
     *   - `groupId`  – Filter by group.
     *
     * @return ApiResponse Response whose structured body is a {@see GeofenceModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(GeofenceModel::class, true)->requestGet('/geofences', $query);
    }

    /**
     * Create a Geofence.
     *
     * `POST /geofences`
     *
     * @param array{
     *     name:        string,
     *     area:        string,
     *     description?: string,
     *     calendarId?:  int,
     *     attributes?:  array<string, mixed>,
     * } $data Geofence data. `name` and `area` (WKT geometry) are required.
     *
     * @return ApiResponse Response whose structured body is the created {@see GeofenceModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(GeofenceModel::class)->requestPost('/geofences', $data);
    }

    /**
     * Fetch a Geofence.
     *
     * `GET /geofences/{id}`
     *
     * @param int $id The unique geofence identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see GeofenceModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(GeofenceModel::class)->requestGet('/geofences/' . $id);
    }

    /**
     * Update a Geofence.
     *
     * `PUT /geofences/{id}`
     *
     * @param int                  $id   The unique geofence identifier.
     * @param array<string, mixed> $data Geofence fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see GeofenceModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(GeofenceModel::class)->requestPut('/geofences/' . $id, $data);
    }

    /**
     * Delete a Geofence.
     *
     * `DELETE /geofences/{id}`
     *
     * @param int $id The unique geofence identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/geofences/' . $id);
    }
}
