<?php

namespace PiccmaQ\TraccarApi\Models;

class GeofenceModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $description = null;
    public ?string $area = null;
    public ?int $calendarId = null;
    public array $attributes = [];
}
