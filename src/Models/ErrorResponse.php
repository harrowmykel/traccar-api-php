<?php

namespace PiccmaQ\TraccarApi\Models;

class ErrorResponse extends AbstractModel
{
    public ?string $message = null;
    public ?int $status = null;
    public ?string $timestamp = null;
    public ?string $path = null;
    public ?string $error = null;
}
