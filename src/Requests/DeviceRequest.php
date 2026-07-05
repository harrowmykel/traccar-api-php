<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\DeviceModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Devices resource.
 *
 * Provides access to all `/devices` endpoints of the Traccar API, covering
 * device listing, creation, retrieval, updating, deletion, accumulator
 * management, and image uploads.
 *
 * @see https://www.traccar.org/api-reference/#tag/Devices
 */
class DeviceRequest extends Request
{
    /**
     * Fetch a list of Devices.
     *
     * `GET /devices`
     *
     * Returns all devices that the authenticated user has access to. Without
     * any query parameters the response contains all visible devices. Narrow
     * the result set with the optional filters below.
     *
     * @param array{
     *     all?:      bool,
     *     userId?:   int,
     *     id?:       int|int[],
     *     uniqueId?: string|string[],
     * } $query Optional query parameters:
     *   - `all`      – Return all devices (admin only).
     *   - `userId`   – Return devices belonging to the given user.
     *   - `id`       – Filter by one or more device IDs.
     *   - `uniqueId` – Filter by one or more unique identifiers (e.g. IMEI).
     *
     * @return ApiResponse Response whose structured body is a {@see DeviceModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(DeviceModel::class, true)->requestGet('/devices', $query);
    }

    /**
     * Create a Device.
     *
     * `POST /devices`
     *
     * @param array{
     *     name:       string,
     *     uniqueId:   string,
     *     groupId?:   int,
     *     phone?:     string,
     *     model?:     string,
     *     contact?:   string,
     *     category?:  string,
     *     disabled?:  bool,
     *     attributes?: array<string, mixed>,
     * } $data Device data. `name` and `uniqueId` are required.
     *
     * @return ApiResponse Response whose structured body is the created {@see DeviceModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(DeviceModel::class)->requestPost('/devices', $data);
    }

    /**
     * Fetch a Device.
     *
     * `GET /devices/{id}`
     *
     * @param int $id The unique device identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see DeviceModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(DeviceModel::class)->requestGet('/devices/' . $id);
    }

    /**
     * Update a Device.
     *
     * `PUT /devices/{id}`
     *
     * @param int                  $id   The unique device identifier.
     * @param array<string, mixed> $data Device fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see DeviceModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(DeviceModel::class)->requestPut('/devices/' . $id, $data);
    }

    /**
     * Delete a Device.
     *
     * `DELETE /devices/{id}`
     *
     * @param int $id The unique device identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/devices/' . $id);
    }

    /**
     * Update total distance and hours of the Device.
     *
     * `PUT /devices/{id}/accumulators`
     *
     * Allows administrators to correct the accumulated odometer and engine-hour
     * values stored for a device.
     *
     * @param int                  $id   The unique device identifier.
     * @param array{
     *     totalDistance?: float,
     *     hours?:         float,
     * } $data Accumulator fields to update.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function updateAccumulators(int $id, array $data): ApiResponse
    {
        return $this->requestPut('/devices/' . $id . '/accumulators', $data);
    }

    /**
     * Upload/Update Device image.
     *
     * `POST /devices/{id}/image`
     *
     * Reads the image file at `$filePath` and uploads its raw binary content
     * as the device icon. Any existing image is replaced.
     *
     * @param int    $id       The unique device identifier.
     * @param string $filePath Absolute filesystem path to the image file.
     *
     * @throws \RuntimeException When the file cannot be read.
     *
     * @return ApiResponse Response from the server (typically 200 with the image URL).
     */
    public function uploadImage(int $id, string $filePath): ApiResponse
    {
        $content = file_get_contents($filePath);
        if ($content === false) {
            throw new \RuntimeException('Unable to read image file: ' . $filePath);
        }

        return $this->api->request('POST', '/devices/' . $id . '/image', [
            'headers' => ['Content-Type' => 'image/*'],
            'body' => $content,
        ]);
    }
}
