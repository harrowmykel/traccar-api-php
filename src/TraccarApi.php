<?php

namespace PiccmaQ\TraccarApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use PiccmaQ\TraccarApi\Requests\AuditRequest;
use PiccmaQ\TraccarApi\Requests\AttributeRequest;
use PiccmaQ\TraccarApi\Requests\CalendarRequest;
use PiccmaQ\TraccarApi\Requests\CommandRequest;
use PiccmaQ\TraccarApi\Requests\DeviceRequest;
use PiccmaQ\TraccarApi\Requests\DriverRequest;
use PiccmaQ\TraccarApi\Requests\EventRequest;
use PiccmaQ\TraccarApi\Requests\GeofenceRequest;
use PiccmaQ\TraccarApi\Requests\GroupRequest;
use PiccmaQ\TraccarApi\Requests\HealthRequest;
use PiccmaQ\TraccarApi\Requests\MaintenanceRequest;
use PiccmaQ\TraccarApi\Requests\NotificationRequest;
use PiccmaQ\TraccarApi\Requests\OrderRequest;
use PiccmaQ\TraccarApi\Requests\PasswordRequest;
use PiccmaQ\TraccarApi\Requests\PermissionRequest;
use PiccmaQ\TraccarApi\Requests\PositionRequest;
use PiccmaQ\TraccarApi\Requests\ReportRequest;
use PiccmaQ\TraccarApi\Requests\ServerRequest;
use PiccmaQ\TraccarApi\Requests\SessionRequest;
use PiccmaQ\TraccarApi\Requests\ShareRequest;
use PiccmaQ\TraccarApi\Requests\StatisticsRequest;
use PiccmaQ\TraccarApi\Requests\UserRequest;
use PiccmaQ\TraccarApi\Responses\Response;
use RuntimeException;

class TraccarApi
{
    private string $baseUrl;
    private ?ClientInterface $httpClient;
    private ?string $email;
    private ?string $password;
    private ?string $authToken;
    private string $authMethod;
    private array $defaultHeaders;

    public function __construct(array $config = [])
    {
        $this->baseUrl = $this->normalizeBaseUrl($config['baseUrl'] ?? 'https://demo.traccar.org/api');
        $this->httpClient = $config['httpClient'] ?? null;
        $this->email = $config['email'] ?? null;
        $this->password = $config['password'] ?? null;
        $this->authToken = $config['authToken'] ?? null;
        $this->authMethod = $config['authMethod'] ?? ($this->authToken ? 'token' : 'none');
        $this->defaultHeaders = $config['headers'] ?? [];
    }

    public static function withAuthorizationToken(string $token): self
    {
        return new self([
            'authMethod' => 'token',
            'authToken' => $token,
        ]);
    }

    public static function withEmailPassword(string $email, string $password): self
    {
        return new self([
            'authMethod' => 'email',
            'email' => $email,
            'password' => $password,
        ]);
    }

    public static function noAuth(): self
    {
        return new self(['authMethod' => 'none']);
    }

    public function setBaseUrl(string $url): self
    {
        $this->baseUrl = $this->normalizeBaseUrl($url);

        return $this;
    }

    public function setHttpClient(ClientInterface $client): self
    {
        $this->httpClient = $client;

        return $this;
    }

    public function getAuthToken(): ?string
    {
        return $this->authToken;
    }

    public function authenticate(): Response
    {
        if ($this->authMethod !== 'email' || empty($this->email) || empty($this->password)) {
            throw new RuntimeException('Email/password authentication is required to authenticate.');
        }

        $response = $this->request('POST', '/session', [
            'form_params' => [
                'email' => $this->email,
                'password' => $this->password,
            ],
        ]);

        $payload = $response->toArray();
        if (is_array($payload) && isset($payload['token'])) {
            $this->authToken = (string) $payload['token'];
        }

        return $response;
    }

    public function server(): ServerRequest
    {
        return new ServerRequest($this);
    }

    public function session(): SessionRequest
    {
        return new SessionRequest($this);
    }

    public function devices(): DeviceRequest
    {
        return new DeviceRequest($this);
    }

    public function groups(): GroupRequest
    {
        return new GroupRequest($this);
    }

    public function share(): ShareRequest
    {
        return new ShareRequest($this);
    }

    public function users(): UserRequest
    {
        return new UserRequest($this);
    }

    public function permissions(): PermissionRequest
    {
        return new PermissionRequest($this);
    }

    public function positions(): PositionRequest
    {
        return new PositionRequest($this);
    }

    public function events(): EventRequest
    {
        return new EventRequest($this);
    }

    public function reports(): ReportRequest
    {
        return new ReportRequest($this);
    }

    public function notifications(): NotificationRequest
    {
        return new NotificationRequest($this);
    }

    public function geofences(): GeofenceRequest
    {
        return new GeofenceRequest($this);
    }

    public function commands(): CommandRequest
    {
        return new CommandRequest($this);
    }

    public function attributes(): AttributeRequest
    {
        return new AttributeRequest($this);
    }

    public function drivers(): DriverRequest
    {
        return new DriverRequest($this);
    }

    public function maintenance(): MaintenanceRequest
    {
        return new MaintenanceRequest($this);
    }

    public function calendars(): CalendarRequest
    {
        return new CalendarRequest($this);
    }

    public function statistics(): StatisticsRequest
    {
        return new StatisticsRequest($this);
    }

    public function health(): HealthRequest
    {
        return new HealthRequest($this);
    }

    public function orders(): OrderRequest
    {
        return new OrderRequest($this);
    }

    public function audit(): AuditRequest
    {
        return new AuditRequest($this);
    }

    public function password(): PasswordRequest
    {
        return new PasswordRequest($this);
    }

    public function request(string $method, string $path, array $options = []): Response
    {
        $url = $this->buildUrl($path);
        $requestOptions = $this->buildRequestOptions($options);

        try {
            $response = $this->getHttpClient()->request($method, $url, $requestOptions);
        } catch (GuzzleException $exception) {
            throw new RuntimeException($exception->getMessage(), (int) $exception->getCode(), $exception);
        }

        return Response::fromPsrResponse($response);
    }

    public function getStructuredBody(Response $response): array|object|null
    {
        return $response->getStructuredBody();
    }

    private function buildUrl(string $path): string
    {
        return rtrim($this->baseUrl, '/') . '/' . ltrim($path, '/');
    }

    private function buildRequestOptions(array $options): array
    {
        $headers = $this->defaultHeaders;
        if (!empty($this->authToken) && $this->authMethod === 'token') {
            $headers['Authorization'] = 'Bearer ' . $this->authToken;
        }

        if ($this->authMethod === 'email' && !empty($this->email) && !empty($this->password)) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->email . ':' . $this->password);
        }

        if (isset($options['headers'])) {
            $headers = array_merge($headers, $options['headers']);
        }

        $requestOptions = array_merge($options, ['headers' => $headers]);
        if (!isset($requestOptions['timeout'])) {
            $requestOptions['timeout'] = 30;
        }

        return $requestOptions;
    }

    private function getHttpClient(): ClientInterface
    {
        if ($this->httpClient instanceof ClientInterface) {
            return $this->httpClient;
        }

        $this->httpClient = new Client();

        return $this->httpClient;
    }

    private function normalizeBaseUrl(string $baseUrl): string
    {
        $baseUrl = rtrim($baseUrl, '/');
        if (substr($baseUrl, -4) !== '/api') {
            $baseUrl .= '/api';
        }

        return $baseUrl;
    }
}
