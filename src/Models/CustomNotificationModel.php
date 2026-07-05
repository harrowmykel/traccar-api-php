<?php

namespace PiccmaQ\TraccarApi\Models;

class CustomNotificationModel extends AbstractModel
{
    public ?string $subject = null;
    public ?string $digest = null;
    public ?string $body = null;
    public bool $priority = false;
}
