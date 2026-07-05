<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\ServerModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Server resource.
 *
 * Provides access to all `/server` endpoints of the Traccar API, covering
 * server configuration retrieval and updates, geocoding, timezone listing,
 * file uploads, garbage collection, cache diagnostics, and server reboots.
 *
 * @see https://www.traccar.org/api-reference/#tag/Server
 */
class ServerRequest extends Request
{
    /**
     * Fetch Server information.
     *
     * `GET /server`
     *
     * Returns the current server configuration, including registration settings,
     * default map coordinates, feature flags, and the Traccar version string.
     * This endpoint does not require authentication.
     *
     * @return ApiResponse Response whose structured body is a {@see ServerModel}.
     */
    public function info(): ApiResponse
    {
        return $this->expectModel(ServerModel::class)->requestGet('/server');
    }

    /**
     * Update Server information.
     *
     * `PUT /server`
     *
     * Updates the global server configuration. Requires administrator privileges.
     *
     * @param array{
     *     id?:               int,
     *     registration?:     bool,
     *     readonly?:         bool,
     *     deviceReadonly?:   bool,
     *     limitCommands?:    bool,
     *     map?:              string,
     *     bingKey?:          string,
     *     mapUrl?:           string,
     *     poiLayer?:         string,
     *     announcement?:     string,
     *     latitude?:         float,
     *     longitude?:        float,
     *     zoom?:             int,
     *     version?:          string,
     *     forceSettings?:    bool,
     *     coordinateFormat?: string,
     *     openIdEnabled?:    bool,
     *     openIdForce?:      bool,
     *     attributes?:       array<string, mixed>,
     * } $data Server configuration fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see ServerModel}.
     */
    public function update(array $data): ApiResponse
    {
        return $this->expectModel(ServerModel::class)->requestPut('/server', $data);
    }

    /**
     * Reverse geocode coordinates.
     *
     * `GET /server/geocode`
     *
     * Converts a WGS-84 latitude/longitude pair to a human-readable address
     * using the geocoding provider configured on the server.
     *
     * @param float $latitude  WGS-84 latitude (decimal degrees, e.g. `52.3676`).
     * @param float $longitude WGS-84 longitude (decimal degrees, e.g. `4.9041`).
     *
     * @return ApiResponse Response body contains the resolved address string.
     */
    public function geocode(float $latitude, float $longitude): ApiResponse
    {
        return $this->requestGet('/server/geocode', [
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    /**
     * Fetch available timezones.
     *
     * `GET /server/timezones`
     *
     * Returns the list of IANA timezone identifiers supported by the server.
     * Useful for populating timezone selection UI components.
     *
     * @return ApiResponse Response body is a JSON array of timezone name strings.
     */
    public function timezones(): ApiResponse
    {
        return $this->requestGet('/server/timezones');
    }

    /**
     * Upload a server file.
     *
     * `POST /server/file/{path}`
     *
     * Uploads arbitrary binary content to the specified server-side path.
     * Used for uploading map overlays, custom icons, and other static assets.
     * Requires administrator privileges.
     *
     * @param string $path    Server-side destination path (URL-encoded automatically).
     * @param string $content Raw binary content to upload.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function uploadFile(string $path, string $content): ApiResponse
    {
        return $this->api->request('POST', '/server/file/' . rawurlencode($path), [
            'headers' => ['Content-Type' => 'application/octet-stream'],
            'body' => $content,
        ]);
    }

    /**
     * Trigger garbage collection.
     *
     * `GET /server/gc`
     *
     * Requests that the JVM run a full garbage collection cycle. Can be useful
     * for freeing memory on long-running servers. Requires administrator privileges.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function gc(): ApiResponse
    {
        return $this->requestGet('/server/gc');
    }

    /**
     * Fetch cache diagnostics.
     *
     * `GET /server/cache`
     *
     * Returns internal cache statistics for diagnostic purposes, such as
     * cache hit/miss rates and current entry counts. Requires administrator privileges.
     *
     * @return ApiResponse Response body contains cache diagnostic data.
     */
    public function cache(): ApiResponse
    {
        return $this->requestGet('/server/cache');
    }

    /**
     * Reboot the server process.
     *
     * `POST /server/reboot`
     *
     * Initiates a graceful restart of the Traccar server process. The server
     * will be temporarily unavailable while it restarts. Requires administrator
     * privileges.
     *
     * @return ApiResponse Empty 204 response (connection may drop before receipt).
     */
    public function reboot(): ApiResponse
    {
        return $this->requestPost('/server/reboot');
    }
}
