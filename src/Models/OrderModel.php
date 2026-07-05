<?php

namespace PiccmaQ\TraccarApi\Models;

class OrderModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $uniqueId = null;
    public ?string $description = null;
    public ?string $fromAddress = null;
    public ?string $toAddress = null;
    public array $attributes = [];
}
