<?php

namespace PiccmaQ\TraccarApi\Responses;

use Psr\Http\Message\ResponseInterface;

class Response
{
    private int $statusCode;
    private array $headers;
    private array $data;
    private ?string $body;
    private array|object|null $structuredBody;

    private function __construct(int $statusCode, array $headers, array $data, ?string $body, array|object|null $structuredBody = null)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->data = $data;
        $this->body = $body;
        $this->structuredBody = $structuredBody;
    }

    public static function fromPsrResponse(ResponseInterface $response): self
    {
        $body = (string) $response->getBody();
        $decoded = json_decode($body, true);
        $data = is_array($decoded) ? $decoded : ['body' => $body];

        return new self(
            $response->getStatusCode(),
            $response->getHeaders(),
            $data,
            $body
        );
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function getStructuredBody(): array|object|null
    {
        return $this->structuredBody;
    }

    public function setStructuredBody(array|object|null $model): self
    {
        $this->structuredBody = $model;

        return $this;
    }

    public function hasStructuredBody(): bool
    {
        return $this->structuredBody !== null;
    }

    public function isSuccessful(): bool
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }
}
