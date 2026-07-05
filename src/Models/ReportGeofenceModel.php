<?php

namespace PiccmaQ\TraccarApi\Models;

class ReportGeofenceModel extends AbstractModel
{
    public ?int $deviceId = null;
    public ?string $deviceName = null;
    public ?int $geofenceId = null;
    public ?string $startTime = null;
    public ?string $endTime = null;
}
