<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Permissions resource.
 *
 * The Traccar permissions system links users to other objects (devices, groups,
 * geofences, etc.) to grant or revoke access. This builder covers all
 * `/permissions` endpoints, including bulk operations.
 *
 * @see https://www.traccar.org/api-reference/#tag/Permissions
 */
class PermissionRequest extends Request
{
    /**
     * Fetch permission links between objects.
     *
     * `GET /permissions`
     *
     * Returns existing permission records. At least one query parameter must be
     * provided to identify which permission relationships to return.
     *
     * @param array{
     *     userId?:       int,
     *     deviceId?:     int,
     *     groupId?:      int,
     *     geofenceId?:   int,
     *     notificationId?: int,
     *     attributeId?:  int,
     *     driverId?:     int,
     *     managedUserId?: int,
     *     calendarId?:   int,
     *     orderId?:      int,
     * } $query At least one filter parameter is required.
     *
     * @return ApiResponse Response containing the matching permission link records.
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->requestGet('/permissions', $query);
    }

    /**
     * Link an object to another object.
     *
     * `POST /permissions`
     *
     * Creates a permission record that grants the specified user (or group)
     * access to the target object. Exactly one pair of linked object IDs must
     * be supplied.
     *
     * @param array{
     *     userId?:        int,
     *     deviceId?:      int,
     *     groupId?:       int,
     *     geofenceId?:    int,
     *     notificationId?: int,
     *     attributeId?:   int,
     *     driverId?:      int,
     *     managedUserId?: int,
     *     calendarId?:    int,
     *     orderId?:       int,
     * } $data Exactly one pair of object IDs to link.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function link(array $data): ApiResponse
    {
        return $this->requestPost('/permissions', $data);
    }

    /**
     * Unlink an object from another object.
     *
     * `DELETE /permissions`
     *
     * Removes the permission record that grants access between the two specified
     * objects. Exactly one pair of object IDs must be supplied.
     *
     * @param array{
     *     userId?:        int,
     *     deviceId?:      int,
     *     groupId?:       int,
     *     geofenceId?:    int,
     *     notificationId?: int,
     *     attributeId?:   int,
     *     driverId?:      int,
     *     managedUserId?: int,
     *     calendarId?:    int,
     *     orderId?:       int,
     * } $data Exactly one pair of object IDs to unlink.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function unlink(array $data): ApiResponse
    {
        return $this->requestDelete('/permissions', $data);
    }

    /**
     * Link multiple objects in a single request.
     *
     * `POST /permissions/bulk`
     *
     * Accepts an array of permission objects and creates all of them atomically.
     * Each element follows the same shape as {@see link()}.
     *
     * @param array<int, array<string, int>> $data Array of permission link objects.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function bulkLink(array $data): ApiResponse
    {
        return $this->requestPost('/permissions/bulk', $data);
    }

    /**
     * Unlink multiple objects in a single request.
     *
     * `DELETE /permissions/bulk`
     *
     * Accepts an array of permission objects and removes all of them atomically.
     * Each element follows the same shape as {@see unlink()}.
     *
     * @param array<int, array<string, int>> $data Array of permission link objects to remove.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function bulkUnlink(array $data): ApiResponse
    {
        return $this->requestDelete('/permissions/bulk', $data);
    }
}
