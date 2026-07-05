<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Share resource.
 *
 * Provides access to the `/share` endpoints of the Traccar API. Share tokens
 * allow temporary, read-only access to device location data without requiring
 * the recipient to have a Traccar account.
 *
 * @see https://www.traccar.org/api-reference/#tag/Share
 */
class ShareRequest extends Request
{
    /**
     * Share device location.
     *
     * `POST /share/device`
     *
     * Generates a time-limited token granting read-only access to a single
     * device's live location. The token can be shared with third parties who
     * do not have a Traccar account.
     *
     * @param array{
     *     deviceId:    int,
     *     expiration?: string,
     * } $data Share request data. `deviceId` is required.
     *   - `expiration` – Optional ISO 8601 date-time at which the token expires.
     *
     * @return ApiResponse Response body contains the generated share token string.
     */
    public function deviceLocation(array $data): ApiResponse
    {
        return $this->requestPost('/share/device', $data);
    }

    /**
     * Share group devices.
     *
     * `POST /share/group`
     *
     * Generates a time-limited token granting read-only access to all devices
     * in the specified group.
     *
     * @param array{
     *     groupId:     int,
     *     expiration?: string,
     * } $data Share request data. `groupId` is required.
     *   - `expiration` – Optional ISO 8601 date-time at which the token expires.
     *
     * @return ApiResponse Response body contains the generated share token string.
     */
    public function groupDevices(array $data): ApiResponse
    {
        return $this->requestPost('/share/group', $data);
    }
}
