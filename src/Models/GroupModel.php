<?php

namespace PiccmaQ\TraccarApi\Models;

class GroupModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?int $groupId = null;
    public array $attributes = [];
}
