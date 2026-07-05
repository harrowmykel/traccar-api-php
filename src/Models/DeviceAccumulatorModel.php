<?php

namespace PiccmaQ\TraccarApi\Models;

class DeviceAccumulatorModel extends AbstractModel
{
    public ?int $deviceId = null;
    public ?float $totalDistance = null;
    public ?float $hours = null;
}
