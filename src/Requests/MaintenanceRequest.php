<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\MaintenanceModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Maintenance resource.
 *
 * Provides access to all `/maintenance` endpoints of the Traccar API.
 * Maintenance tasks define service schedules based on odometer readings,
 * engine hours, or elapsed time, and generate alerts when a device is due
 * for service.
 *
 * @see https://www.traccar.org/api-reference/#tag/Maintenance
 */
class MaintenanceRequest extends Request
{
    /**
     * Fetch a list of Maintenance tasks.
     *
     * `GET /maintenance`
     *
     * Returns all maintenance task definitions visible to the authenticated user.
     *
     * @param array{
     *     all?:      bool,
     *     userId?:   int,
     *     deviceId?: int,
     *     groupId?:  int,
     *     refresh?:  bool,
     * } $query Optional query parameters:
     *   - `all`      – Return all maintenance tasks (admin only).
     *   - `userId`   – Filter by user.
     *   - `deviceId` – Filter by device.
     *   - `groupId`  – Filter by group.
     *
     * @return ApiResponse Response whose structured body is a {@see MaintenanceModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(MaintenanceModel::class, true)->requestGet('/maintenance', $query);
    }

    /**
     * Create a Maintenance task.
     *
     * `POST /maintenance`
     *
     * @param array{
     *     name:       string,
     *     type:       string,
     *     start:      float,
     *     period:     float,
     *     attributes?: array<string, mixed>,
     * } $data Maintenance data. `name`, `type`, `start`, and `period` are required.
     *   - `type`   – The accumulator to track: `'totalDistance'`, `'hours'`, or a custom attribute key.
     *   - `start`  – The accumulator value at which the first service is due.
     *   - `period` – Interval between subsequent services (same unit as `type`).
     *
     * @return ApiResponse Response whose structured body is the created {@see MaintenanceModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(MaintenanceModel::class)->requestPost('/maintenance', $data);
    }

    /**
     * Fetch a Maintenance task.
     *
     * `GET /maintenance/{id}`
     *
     * @param int $id The unique maintenance task identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see MaintenanceModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(MaintenanceModel::class)->requestGet('/maintenance/' . $id);
    }

    /**
     * Update a Maintenance task.
     *
     * `PUT /maintenance/{id}`
     *
     * @param int                  $id   The unique maintenance task identifier.
     * @param array<string, mixed> $data Maintenance fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see MaintenanceModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(MaintenanceModel::class)->requestPut('/maintenance/' . $id, $data);
    }

    /**
     * Delete a Maintenance task.
     *
     * `DELETE /maintenance/{id}`
     *
     * @param int $id The unique maintenance task identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/maintenance/' . $id);
    }
}
