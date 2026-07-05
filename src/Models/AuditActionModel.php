<?php

namespace PiccmaQ\TraccarApi\Models;

class AuditActionModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $actionTime = null;
    public ?string $address = null;
    public ?int $userId = null;
    public ?string $userEmail = null;
    public ?string $actionType = null;
    public ?string $objectType = null;
    public ?int $objectId = null;
    public array $attributes = [];
}
