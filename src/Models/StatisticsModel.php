<?php

namespace PiccmaQ\TraccarApi\Models;

class StatisticsModel extends AbstractModel
{
    public ?string $captureTime = null;
    public ?int $activeUsers = null;
    public ?int $activeDevices = null;
    public ?int $requests = null;
    public ?int $messagesReceived = null;
    public ?int $messagesStored = null;
}
