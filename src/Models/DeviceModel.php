<?php

namespace PiccmaQ\TraccarApi\Models;

class DeviceModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $uniqueId = null;
    public ?string $status = null;
    public bool $disabled = false;
    public ?string $lastUpdate = null;
    public ?int $positionId = null;
    public ?int $groupId = null;
    public ?string $phone = null;
    public ?string $model = null;
    public ?string $contact = null;
    public ?string $category = null;
    public array $attributes = [];
}
