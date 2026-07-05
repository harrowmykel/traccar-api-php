<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\StatisticsModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Statistics resource.
 *
 * Provides access to the `/statistics` endpoint of the Traccar API.
 * Server statistics include aggregated usage metrics such as the number of
 * active devices, reported positions, and registered users over time.
 *
 * @see https://www.traccar.org/api-reference/#tag/Statistics
 */
class StatisticsRequest extends Request
{
    /**
     * Fetch Server Statistics.
     *
     * `GET /statistics`
     *
     * Returns time-series statistics about the Traccar server, including
     * device activity and position throughput. Requires administrator privileges.
     *
     * @return ApiResponse Response whose structured body is a {@see StatisticsModel}[].
     */
    public function server(): ApiResponse
    {
        return $this->expectModel(StatisticsModel::class, true)->requestGet('/statistics');
    }
}
