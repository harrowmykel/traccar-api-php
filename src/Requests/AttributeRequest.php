<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\ComputedAttributeModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Attributes resource.
 *
 * Provides access to all `/attributes/computed` endpoints of the Traccar API.
 * Computed attributes are server-side expressions that derive additional values
 * from raw position data (e.g. fuel level in litres calculated from a raw
 * sensor voltage). They are evaluated for each incoming position and stored
 * alongside the raw attributes.
 *
 * @see https://www.traccar.org/api-reference/#tag/Attributes
 */
class AttributeRequest extends Request
{
    /**
     * Fetch a list of Computed Attributes.
     *
     * `GET /attributes/computed`
     *
     * Returns all computed attribute definitions visible to the authenticated user.
     *
     * @param array{
     *     all?:      bool,
     *     userId?:   int,
     *     deviceId?: int,
     *     groupId?:  int,
     *     refresh?:  bool,
     * } $query Optional query parameters:
     *   - `all`      – Return all computed attributes (admin only).
     *   - `userId`   – Filter by user.
     *   - `deviceId` – Filter by device.
     *   - `groupId`  – Filter by group.
     *
     * @return ApiResponse Response whose structured body is a {@see ComputedAttributeModel}[].
     */
    public function computedList(array $query = []): ApiResponse
    {
        return $this->expectModel(ComputedAttributeModel::class, true)->requestGet('/attributes/computed', $query);
    }

    /**
     * Create a Computed Attribute.
     *
     * `POST /attributes/computed`
     *
     * @param array{
     *     description: string,
     *     attribute:   string,
     *     expression:  string,
     *     type?:       string,
     * } $data Attribute data. `description`, `attribute`, and `expression` are required.
     *   - `attribute`  – The output attribute name that will store the computed value.
     *   - `expression` – JavaScript-like expression evaluated against position attributes.
     *   - `type`       – Output type hint (`'string'`, `'number'`, `'boolean'`).
     *
     * @return ApiResponse Response whose structured body is the created {@see ComputedAttributeModel}.
     */
    public function createComputed(array $data): ApiResponse
    {
        return $this->expectModel(ComputedAttributeModel::class)->requestPost('/attributes/computed', $data);
    }

    /**
     * Evaluate a Computed Attribute against the latest Device Position.
     *
     * `POST /attributes/computed/test`
     *
     * Tests a computed attribute expression against the current position of a
     * device without persisting the attribute definition. Useful for validating
     * expressions during development.
     *
     * @param array{
     *     deviceId:   int,
     *     expression: string,
     *     type?:      string,
     * } $data Test data. `deviceId` and `expression` are required.
     *
     * @return ApiResponse Response containing the evaluated result value.
     */
    public function testComputed(array $data): ApiResponse
    {
        return $this->requestPost('/attributes/computed/test', $data);
    }

    /**
     * Fetch a Computed Attribute.
     *
     * `GET /attributes/computed/{id}`
     *
     * @param int $id The unique computed attribute identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see ComputedAttributeModel}.
     */
    public function getComputed(int $id): ApiResponse
    {
        return $this->expectModel(ComputedAttributeModel::class)->requestGet('/attributes/computed/' . $id);
    }

    /**
     * Update a Computed Attribute.
     *
     * `PUT /attributes/computed/{id}`
     *
     * @param int                  $id   The unique computed attribute identifier.
     * @param array<string, mixed> $data Attribute fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see ComputedAttributeModel}.
     */
    public function updateComputed(int $id, array $data): ApiResponse
    {
        return $this->expectModel(ComputedAttributeModel::class)->requestPut('/attributes/computed/' . $id, $data);
    }

    /**
     * Delete a Computed Attribute.
     *
     * `DELETE /attributes/computed/{id}`
     *
     * @param int $id The unique computed attribute identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function deleteComputed(int $id): ApiResponse
    {
        return $this->requestDelete('/attributes/computed/' . $id);
    }
}
