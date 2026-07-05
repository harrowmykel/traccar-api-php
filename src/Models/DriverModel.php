<?php

namespace PiccmaQ\TraccarApi\Models;

class DriverModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $uniqueId = null;
    public array $attributes = [];
}
