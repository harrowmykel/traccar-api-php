<?php

namespace PiccmaQ\TraccarApi\Models;

class ReportStopModel extends AbstractModel
{
    public ?int $deviceId = null;
    public ?string $deviceName = null;
    public ?float $duration = null;
    public ?string $startTime = null;
    public ?string $address = null;
    public ?float $lat = null;
    public ?float $lon = null;
    public ?string $endTime = null;
    public ?float $spentFuel = null;
    public ?float $engineHours = null;
}
