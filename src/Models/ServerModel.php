<?php

namespace PiccmaQ\TraccarApi\Models;

class ServerModel extends AbstractModel
{
    public ?int $id = null;
    public bool $registration = false;
    public bool $readonly = false;
    public bool $deviceReadonly = false;
    public bool $limitCommands = false;
    public ?string $map = null;
    public ?string $bingKey = null;
    public ?string $mapUrl = null;
    public ?string $poiLayer = null;
    public ?string $announcement = null;
    public ?float $latitude = null;
    public ?float $longitude = null;
    public ?int $zoom = null;
    public ?string $version = null;
    public bool $forceSettings = false;
    public ?string $coordinateFormat = null;
    public bool $openIdEnabled = false;
    public bool $openIdForce = false;
    public array $attributes = [];
}
