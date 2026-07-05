<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\AuditActionModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Audit resource.
 *
 * Provides access to the `/audit` endpoint of the Traccar API. The audit log
 * records administrative actions (object creation, modification, deletion) with
 * timestamps and actor information, enabling accountability and traceability.
 * Requires administrator privileges.
 *
 * @see https://www.traccar.org/api-reference/#tag/Audit
 */
class AuditRequest extends Request
{
    /**
     * Fetch audit log Actions.
     *
     * `GET /audit`
     *
     * Returns a list of audit log entries matching the given filters. Results
     * are ordered chronologically.
     *
     * @param array{
     *     from?:   string,
     *     to?:     string,
     *     userId?: int,
     * } $query Optional query parameters:
     *   - `from`   – Start of the time range (ISO 8601).
     *   - `to`     – End of the time range (ISO 8601).
     *   - `userId` – Filter entries by the user who performed the action.
     *
     * @return ApiResponse Response whose structured body is an {@see AuditActionModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(AuditActionModel::class, true)->requestGet('/audit', $query);
    }
}
