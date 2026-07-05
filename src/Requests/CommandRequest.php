<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\CommandModel;
use PiccmaQ\TraccarApi\Models\CommandTypeModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Commands resource.
 *
 * Provides access to all `/commands` endpoints of the Traccar API. Commands
 * can be saved for reuse or dispatched directly to devices. The available
 * command types depend on the protocol used by each device.
 *
 * @see https://www.traccar.org/api-reference/#tag/Commands
 */
class CommandRequest extends Request
{
    /**
     * Fetch a list of Saved Commands.
     *
     * `GET /commands`
     *
     * Returns all saved command templates visible to the authenticated user.
     *
     * @param array{
     *     all?:      bool,
     *     userId?:   int,
     *     deviceId?: int,
     *     groupId?:  int,
     *     refresh?:  bool,
     * } $query Optional query parameters:
     *   - `all`      – Return all saved commands (admin only).
     *   - `userId`   – Filter by user.
     *   - `deviceId` – Filter by device.
     *   - `groupId`  – Filter by group.
     *
     * @return ApiResponse Response whose structured body is a {@see CommandModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(CommandModel::class, true)->requestGet('/commands', $query);
    }

    /**
     * Create a Saved Command.
     *
     * `POST /commands`
     *
     * Saves a command template that can be reused to send commands to devices
     * without re-specifying all parameters each time.
     *
     * @param array{
     *     type:        string,
     *     description?: string,
     *     deviceId?:   int,
     *     sendSms?:    bool,
     *     attributes?: array<string, mixed>,
     * } $data Command data. `type` is required.
     *
     * @return ApiResponse Response whose structured body is the created {@see CommandModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(CommandModel::class)->requestPost('/commands', $data);
    }

    /**
     * Fetch a Saved Command.
     *
     * `GET /commands/{id}`
     *
     * @param int $id The unique saved command identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see CommandModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(CommandModel::class)->requestGet('/commands/' . $id);
    }

    /**
     * Update a Saved Command.
     *
     * `PUT /commands/{id}`
     *
     * @param int                  $id   The unique saved command identifier.
     * @param array<string, mixed> $data Command fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see CommandModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(CommandModel::class)->requestPut('/commands/' . $id, $data);
    }

    /**
     * Delete a Saved Command.
     *
     * `DELETE /commands/{id}`
     *
     * @param int $id The unique saved command identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/commands/' . $id);
    }

    /**
     * Fetch a list of Saved Commands supported by a Device at the moment.
     *
     * `GET /commands/send`
     *
     * Returns saved command templates that are currently applicable to the
     * specified device, taking the device's active protocol into account.
     *
     * @param array{
     *     deviceId?: int,
     * } $query Optional query parameters:
     *   - `deviceId` – The device to check supported commands for.
     *
     * @return ApiResponse Response whose structured body is a {@see CommandModel}[].
     */
    public function send(array $query = []): ApiResponse
    {
        return $this->expectModel(CommandModel::class, true)->requestGet('/commands/send', $query);
    }

    /**
     * Dispatch a command to a Device.
     *
     * `POST /commands/send`
     *
     * Immediately sends a command to the specified device. If the device is
     * currently offline and the protocol supports queuing, the command may be
     * queued until the device reconnects.
     *
     * @param array{
     *     deviceId:    int,
     *     type:        string,
     *     attributes?: array<string, mixed>,
     * } $data Command dispatch data. `deviceId` and `type` are required.
     *
     * @return ApiResponse Response whose structured body is the dispatched {@see CommandModel}.
     */
    public function dispatch(array $data): ApiResponse
    {
        return $this->expectModel(CommandModel::class)->requestPost('/commands/send', $data);
    }

    /**
     * Fetch a list of available Command types for a Device.
     *
     * `GET /commands/types`
     *
     * Returns all command types available for the device's protocol. If no
     * device is specified, all known command types are returned.
     *
     * @return ApiResponse Response whose structured body is a {@see CommandTypeModel}[].
     */
    public function types(): ApiResponse
    {
        return $this->expectModel(CommandTypeModel::class, true)->requestGet('/commands/types');
    }
}
