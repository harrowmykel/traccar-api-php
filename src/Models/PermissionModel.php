<?php

namespace PiccmaQ\TraccarApi\Models;

class PermissionModel extends AbstractModel
{
    public ?int $userId = null;
    public ?int $deviceId = null;
    public ?int $groupId = null;
    public ?int $geofenceId = null;
    public ?int $notificationId = null;
    public ?int $calendarId = null;
    public ?int $attributeId = null;
    public ?int $driverId = null;
    public ?int $managedUserId = null;
    public ?int $commandId = null;
}
