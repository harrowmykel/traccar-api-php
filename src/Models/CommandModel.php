<?php

namespace PiccmaQ\TraccarApi\Models;

class CommandModel extends AbstractModel
{
    public ?int $id = null;
    public ?int $deviceId = null;
    public ?string $description = null;
    public ?string $type = null;
    public bool $textChannel = false;
    public array $attributes = [];
}
