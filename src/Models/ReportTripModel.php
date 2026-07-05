<?php

namespace PiccmaQ\TraccarApi\Models;

class ReportTripModel extends AbstractModel
{
    public ?int $deviceId = null;
    public ?string $deviceName = null;
    public ?float $maxSpeed = null;
    public ?float $averageSpeed = null;
    public ?float $distance = null;
    public ?float $spentFuel = null;
    public ?float $duration = null;
    public ?string $startTime = null;
    public ?string $startAddress = null;
    public ?float $startLat = null;
    public ?float $startLon = null;
    public ?string $endTime = null;
    public ?string $endAddress = null;
    public ?float $endLat = null;
    public ?float $endLon = null;
    public ?string $driverUniqueId = null;
    public ?string $driverName = null;
}
