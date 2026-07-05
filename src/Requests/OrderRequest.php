<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\OrderModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Orders resource.
 *
 * Provides access to all `/orders` endpoints of the Traccar API. Orders
 * represent dispatch instructions or work orders that can be assigned to
 * devices for logistics and field-service tracking use cases.
 *
 * @see https://www.traccar.org/api-reference/#tag/Orders
 */
class OrderRequest extends Request
{
    /**
     * Fetch a list of Orders.
     *
     * `GET /orders`
     *
     * Returns all orders visible to the authenticated user.
     *
     * @param array<string, mixed> $query Optional query parameters (e.g. `userId`, `deviceId`).
     *
     * @return ApiResponse Response whose structured body is an {@see OrderModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(OrderModel::class, true)->requestGet('/orders', $query);
    }

    /**
     * Create an Order.
     *
     * `POST /orders`
     *
     * @param array{
     *     deviceId:    int,
     *     uniqueId?:   string,
     *     description?: string,
     *     fromAddress?: string,
     *     toAddress?:   string,
     *     attributes?:  array<string, mixed>,
     * } $data Order data. `deviceId` is required.
     *
     * @return ApiResponse Response whose structured body is the created {@see OrderModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(OrderModel::class)->requestPost('/orders', $data);
    }

    /**
     * Fetch an Order.
     *
     * `GET /orders/{id}`
     *
     * @param int $id The unique order identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see OrderModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(OrderModel::class)->requestGet('/orders/' . $id);
    }

    /**
     * Update an Order.
     *
     * `PUT /orders/{id}`
     *
     * @param int                  $id   The unique order identifier.
     * @param array<string, mixed> $data Order fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see OrderModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(OrderModel::class)->requestPut('/orders/' . $id, $data);
    }

    /**
     * Delete an Order.
     *
     * `DELETE /orders/{id}`
     *
     * @param int $id The unique order identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/orders/' . $id);
    }
}
