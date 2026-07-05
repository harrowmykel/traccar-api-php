<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Health resource.
 *
 * Provides access to the `/health` endpoint of the Traccar API.
 * The health check endpoint can be used for monitoring and load-balancer
 * probes to determine whether the server is up and ready to serve requests.
 *
 * @see https://www.traccar.org/api-reference/#tag/Health
 */
class HealthRequest extends Request
{
    /**
     * Check server health.
     *
     * `GET /health`
     *
     * Returns HTTP 200 when the server is healthy and able to accept requests.
     * A non-2xx response indicates a problem with the server or its dependencies.
     * This endpoint does not require authentication.
     *
     * @return ApiResponse HTTP 200 response when the server is healthy.
     */
    public function check(): ApiResponse
    {
        return $this->requestGet('/health');
    }
}
