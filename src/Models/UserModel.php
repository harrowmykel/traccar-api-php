<?php

namespace PiccmaQ\TraccarApi\Models;

class UserModel extends AbstractModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $email = null;
    public ?string $phone = null;
    public bool $readonly = false;
    public bool $administrator = false;
    public ?string $map = null;
    public ?float $latitude = null;
    public ?float $longitude = null;
    public ?int $zoom = null;
    public ?string $password = null;
    public ?string $coordinateFormat = null;
    public bool $disabled = false;
    public ?string $expirationTime = null;
    public ?int $deviceLimit = null;
    public ?int $userLimit = null;
    public bool $deviceReadonly = false;
    public bool $limitCommands = false;
    public bool $fixedEmail = false;
    public ?string $poiLayer = null;
    public array $attributes = [];
}
