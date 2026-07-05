<?php

namespace PiccmaQ\TraccarApi\Models;

class EventModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $type = null;
    public ?string $eventTime = null;
    public ?int $deviceId = null;
    public ?int $positionId = null;
    public ?int $geofenceId = null;
    public ?int $maintenanceId = null;
    public array $attributes = [];
}
