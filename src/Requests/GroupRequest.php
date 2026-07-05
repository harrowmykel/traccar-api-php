<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\GroupModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Groups resource.
 *
 * Provides access to all `/groups` endpoints of the Traccar API. Groups allow
 * devices to be organised hierarchically. Permissions granted to a group
 * automatically apply to all devices within that group.
 *
 * @see https://www.traccar.org/api-reference/#tag/Groups
 */
class GroupRequest extends Request
{
    /**
     * Fetch a list of Groups.
     *
     * `GET /groups`
     *
     * Returns all groups visible to the authenticated user.
     *
     * @param array{
     *     all?:    bool,
     *     userId?: int,
     * } $query Optional query parameters:
     *   - `all`    – Return all groups (admin only).
     *   - `userId` – Return groups belonging to the given user.
     *
     * @return ApiResponse Response whose structured body is a {@see GroupModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(GroupModel::class, true)->requestGet('/groups', $query);
    }

    /**
     * Create a Group.
     *
     * `POST /groups`
     *
     * @param array{
     *     name:       string,
     *     groupId?:   int,
     *     attributes?: array<string, mixed>,
     * } $data Group data. `name` is required.
     *
     * @return ApiResponse Response whose structured body is the created {@see GroupModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(GroupModel::class)->requestPost('/groups', $data);
    }

    /**
     * Fetch a Group.
     *
     * `GET /groups/{id}`
     *
     * @param int $id The unique group identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see GroupModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(GroupModel::class)->requestGet('/groups/' . $id);
    }

    /**
     * Update a Group.
     *
     * `PUT /groups/{id}`
     *
     * @param int                  $id   The unique group identifier.
     * @param array<string, mixed> $data Group fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see GroupModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(GroupModel::class)->requestPut('/groups/' . $id, $data);
    }

    /**
     * Delete a Group.
     *
     * `DELETE /groups/{id}`
     *
     * @param int $id The unique group identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/groups/' . $id);
    }
}
