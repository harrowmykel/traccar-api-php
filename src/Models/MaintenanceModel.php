<?php

namespace PiccmaQ\TraccarApi\Models;

class MaintenanceModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $type = null;
    public ?float $start = null;
    public ?float $period = null;
    public array $attributes = [];
}
