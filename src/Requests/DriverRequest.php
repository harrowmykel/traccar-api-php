<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\DriverModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Drivers resource.
 *
 * Provides access to all `/drivers` endpoints of the Traccar API. Drivers can
 * be associated with devices and identified by their unique attribute
 * transmitted by the device (e.g. an iButton identifier).
 *
 * @see https://www.traccar.org/api-reference/#tag/Drivers
 */
class DriverRequest extends Request
{
    /**
     * Fetch a list of Drivers.
     *
     * `GET /drivers`
     *
     * Returns all drivers visible to the authenticated user.
     *
     * @param array{
     *     all?:      bool,
     *     userId?:   int,
     *     deviceId?: int,
     *     groupId?:  int,
     *     refresh?:  bool,
     * } $query Optional query parameters:
     *   - `all`      – Return all drivers (admin only).
     *   - `userId`   – Filter by user.
     *   - `deviceId` – Filter by device.
     *   - `groupId`  – Filter by group.
     *
     * @return ApiResponse Response whose structured body is a {@see DriverModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(DriverModel::class, true)->requestGet('/drivers', $query);
    }

    /**
     * Create a Driver.
     *
     * `POST /drivers`
     *
     * @param array{
     *     name:        string,
     *     uniqueId:    string,
     *     attributes?: array<string, mixed>,
     * } $data Driver data. `name` and `uniqueId` are required.
     *   - `uniqueId` – Unique identifier transmitted by the device to identify the driver
     *                  (e.g. an iButton or RFID key value).
     *
     * @return ApiResponse Response whose structured body is the created {@see DriverModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(DriverModel::class)->requestPost('/drivers', $data);
    }

    /**
     * Fetch a Driver.
     *
     * `GET /drivers/{id}`
     *
     * @param int $id The unique driver identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see DriverModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(DriverModel::class)->requestGet('/drivers/' . $id);
    }

    /**
     * Update a Driver.
     *
     * `PUT /drivers/{id}`
     *
     * @param int                  $id   The unique driver identifier.
     * @param array<string, mixed> $data Driver fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see DriverModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(DriverModel::class)->requestPut('/drivers/' . $id, $data);
    }

    /**
     * Delete a Driver.
     *
     * `DELETE /drivers/{id}`
     *
     * @param int $id The unique driver identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/drivers/' . $id);
    }
}
