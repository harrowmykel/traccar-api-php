<?php

namespace PiccmaQ\TraccarApi\Models;

class PositionModel extends AbstractModel
{
    public ?int $id = null;
    public ?int $deviceId = null;
    public ?string $protocol = null;
    public ?string $deviceTime = null;
    public ?string $fixTime = null;
    public ?string $serverTime = null;
    public bool $valid = false;
    public ?float $latitude = null;
    public ?float $longitude = null;
    public ?float $altitude = null;
    public ?float $speed = null;
    public ?float $course = null;
    public ?string $address = null;
    public ?float $accuracy = null;
    public array $network = [];
    public array $geofenceIds = [];
    public array $attributes = [];
}
