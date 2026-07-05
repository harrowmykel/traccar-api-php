<?php

namespace PiccmaQ\TraccarApi\Models;

class NotificationModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $type = null;
    public ?string $description = null;
    public bool $always = false;
    public ?int $commandId = null;
    public ?string $notificators = null;
    public ?int $calendarId = null;
    public array $attributes = [];
}
