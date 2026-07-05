<?php

namespace PiccmaQ\TraccarApi\Models;

class ComputedAttributeModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $description = null;
    public ?string $attribute = null;
    public ?string $expression = null;
    public ?string $type = null;
}
