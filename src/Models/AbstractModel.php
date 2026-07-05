<?php

namespace PiccmaQ\TraccarApi\Models;

abstract class AbstractModel implements ModelInterface
{
    public function __construct(array $data = [])
    {
        $this->fromArray($data);
    }

    public function fromArray(array $data): self
    {
        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $this->normalizeValue($value);
            }
        }

        return $this;
    }

    public function toArray(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $property => $value) {
            $data[$property] = $this->normalizeForSerialization($value);
        }

        return $data;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function __call(string $name, array $arguments): mixed
    {
        if (str_starts_with($name, 'get') && strlen($name) > 3) {
            $property = lcfirst(substr($name, 3));
            if (property_exists($this, $property)) {
                return $this->{$property};
            }
        }

        throw new \BadMethodCallException(sprintf('Method %s does not exist.', $name));
    }

    protected function normalizeValue(mixed $value): mixed
    {
        if ($value instanceof self) {
            return $value;
        }

        if (is_array($value)) {
            $normalized = [];
            foreach ($value as $key => $item) {
                $normalized[$key] = $item instanceof self ? $item->toArray() : $item;
            }

            return $normalized;
        }

        return $value;
    }

    protected function normalizeForSerialization(mixed $value): mixed
    {
        if ($value instanceof self) {
            return $value->toArray();
        }

        if (is_array($value)) {
            $serialized = [];
            foreach ($value as $key => $item) {
                $serialized[$key] = $item instanceof self ? $item->toArray() : $item;
            }

            return $serialized;
        }

        return $value;
    }
}
