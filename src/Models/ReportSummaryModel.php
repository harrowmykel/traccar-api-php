<?php

namespace PiccmaQ\TraccarApi\Models;

class ReportSummaryModel extends AbstractModel
{
    public ?int $deviceId = null;
    public ?string $deviceName = null;
    public ?float $maxSpeed = null;
    public ?float $averageSpeed = null;
    public ?float $distance = null;
    public ?float $spentFuel = null;
    public ?float $engineHours = null;
}
