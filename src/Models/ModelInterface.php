<?php

namespace PiccmaQ\TraccarApi\Models;

interface ModelInterface
{
    public function toArray(): array;

    public function fromArray(array $data): self;

    public function jsonSerialize(): array;
}
