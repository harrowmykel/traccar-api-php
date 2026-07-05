<?php

namespace PiccmaQ\TraccarApi\Models;

class ShareRequest extends AbstractModel
{
    public ?int $deviceId = null;
    public ?int $groupId = null;
    public ?string $expiration = null;
}
