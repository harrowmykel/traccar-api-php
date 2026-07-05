<?php

namespace PiccmaQ\TraccarApi\Models;

class ReportCombinedModel extends AbstractModel
{
    public ?int $deviceId = null;
    public array $route = [];
    public array $events = [];
    public array $positions = [];
}
