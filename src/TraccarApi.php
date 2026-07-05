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

/**
 * The main client class for interacting with the Traccar REST API.
 *
 * Provides factory methods for authentication, helper methods to set the HTTP client and base URL,
 * and entry points to all resource-specific request builders.
 */
class TraccarApi
{
    /** @var string The normalized Traccar API base URL. */
    private string $baseUrl;

    /** @var ClientInterface|null The Guzzle HTTP client instance. */
    private ?ClientInterface $httpClient;

    /** @var string|null Email address for session authentication. */
    private ?string $email;

    /** @var string|null Password for session authentication. */
    private ?string $password;

    /** @var string|null The cached or provided Bearer/session authentication token. */
    private ?string $authToken;

    /** @var string The chosen authentication method ('token', 'email', or 'none'). */
    private string $authMethod;

    /** @var array<string, mixed> Default HTTP headers included in every request. */
    private array $defaultHeaders;

    /**
     * Create a new Traccar API client instance.
     *
     * @param array<string, mixed> $config Configuration array. Supported keys:
     *                                      - 'baseUrl' (string) Defaults to 'https://demo.traccar.org/api'
     *                                      - 'httpClient' (ClientInterface) Optional custom Guzzle client.
     *                                      - 'email' (string) Required for email/password auth.
     *                                      - 'password' (string) Required for email/password auth.
     *                                      - 'authToken' (string) Pre-configured API token.
     *                                      - 'authMethod' (string) 'token', 'email', or 'none'.
     *                                      - 'headers' (array) Default custom headers.
     */
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

    /**
     * Create a client pre-configured with Bearer token authentication.
     *
     * @param string $token The Traccar API authorization token.
     * @return self
     */
    public static function withAuthorizationToken(string $token): self
    {
        return new self([
            'authMethod' => 'token',
            'authToken' => $token,
        ]);
    }

    /**
     * Create a client configured to use email/password for authentication.
     *
     * @param string $email
     * @param string $password
     * @return self
     */
    public static function withEmailPassword(string $email, string $password): self
    {
        return new self([
            'authMethod' => 'email',
            'email' => $email,
            'password' => $password,
        ]);
    }

    /**
     * Create a client configured with no authentication.
     *
     * @return self
     */
    public static function noAuth(): self
    {
        return new self(['authMethod' => 'none']);
    }

    /**
     * Update the base URL dynamically.
     *
     * @param string $url The new Traccar server API base URL.
     * @return self
     */
    public function setBaseUrl(string $url): self
    {
        $this->baseUrl = $this->normalizeBaseUrl($url);

        return $this;
    }

    /**
     * Inject a custom Guzzle HTTP client interface.
     *
     * @param ClientInterface $client
     * @return self
     */
    public function setHttpClient(ClientInterface $client): self
    {
        $this->httpClient = $client;

        return $this;
    }

    /**
     * Retrieve the currently cached or configured authentication token.
     *
     * @return string|null
     */
    public function getAuthToken(): ?string
    {
        return $this->authToken;
    }

    /**
     * Authenticate via email & password and cache the resulting session token.
     *
     * Sends a POST request to /session. If successful, caches the returned token.
     *
     * @throws RuntimeException If the client is not configured for email authentication or credentials are empty.
     * @return Response
     */
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

    /**
     * Access Server metadata and settings.
     *
     * @return ServerRequest
     */
    public function server(): ServerRequest
    {
        return new ServerRequest($this);
    }

    /**
     * Access Session resource actions (e.g., login, close, tokens).
     *
     * @return SessionRequest
     */
    public function session(): SessionRequest
    {
        return new SessionRequest($this);
    }

    /**
     * Access Devices resource actions.
     *
     * @return DeviceRequest
     */
    public function devices(): DeviceRequest
    {
        return new DeviceRequest($this);
    }

    /**
     * Access Groups resource actions.
     *
     * @return GroupRequest
     */
    public function groups(): GroupRequest
    {
        return new GroupRequest($this);
    }

    /**
     * Access Share tokens resource actions.
     *
     * @return ShareRequest
     */
    public function share(): ShareRequest
    {
        return new ShareRequest($this);
    }

    /**
     * Access Users resource actions.
     *
     * @return UserRequest
     */
    public function users(): UserRequest
    {
        return new UserRequest($this);
    }

    /**
     * Access Permissions management.
     *
     * @return PermissionRequest
     */
    public function permissions(): PermissionRequest
    {
        return new PermissionRequest($this);
    }

    /**
     * Access GPS positions resource actions.
     *
     * @return PositionRequest
     */
    public function positions(): PositionRequest
    {
        return new PositionRequest($this);
    }

    /**
     * Access Events query actions.
     *
     * @return EventRequest
     */
    public function events(): EventRequest
    {
        return new EventRequest($this);
    }

    /**
     * Access Reports resource actions (e.g. routes, summaries, trips).
     *
     * @return ReportRequest
     */
    public function reports(): ReportRequest
    {
        return new ReportRequest($this);
    }

    /**
     * Access Notifications resource actions.
     *
     * @return NotificationRequest
     */
    public function notifications(): NotificationRequest
    {
        return new NotificationRequest($this);
    }

    /**
     * Access Geofences resource actions.
     *
     * @return GeofenceRequest
     */
    public function geofences(): GeofenceRequest
    {
        return new GeofenceRequest($this);
    }

    /**
     * Access Commands dispatch interface.
     *
     * @return CommandRequest
     */
    public function commands(): CommandRequest
    {
        return new CommandRequest($this);
    }

    /**
     * Access Computed attributes configuration.
     *
     * @return AttributeRequest
     */
    public function attributes(): AttributeRequest
    {
        return new AttributeRequest($this);
    }

    /**
     * Access Drivers resource actions.
     *
     * @return DriverRequest
     */
    public function drivers(): DriverRequest
    {
        return new DriverRequest($this);
    }

    /**
     * Access Maintenance configuration interface.
     *
     * @return MaintenanceRequest
     */
    public function maintenance(): MaintenanceRequest
    {
        return new MaintenanceRequest($this);
    }

    /**
     * Access Calendars configuration interface.
     *
     * @return CalendarRequest
     */
    public function calendars(): CalendarRequest
    {
        return new CalendarRequest($this);
    }

    /**
     * Access Server statistics endpoint.
     *
     * @return StatisticsRequest
     */
    public function statistics(): StatisticsRequest
    {
        return new StatisticsRequest($this);
    }

    /**
     * Access Server health endpoint.
     *
     * @return HealthRequest
     */
    public function health(): HealthRequest
    {
        return new HealthRequest($this);
    }

    /**
     * Access Orders resource actions.
     *
     * @return OrderRequest
     */
    public function orders(): OrderRequest
    {
        return new OrderRequest($this);
    }

    /**
     * Access Audit log endpoint.
     *
     * @return AuditRequest
     */
    public function audit(): AuditRequest
    {
        return new AuditRequest($this);
    }

    /**
     * Access Password resets endpoint.
     *
     * @return PasswordRequest
     */
    public function password(): PasswordRequest
    {
        return new PasswordRequest($this);
    }

    /**
     * Dispatch an HTTP request using the underlying HTTP client.
     *
     * Handles authorization headers automatically based on the configured authMethod.
     *
     * @param string               $method  HTTP verb (GET, POST, PUT, DELETE, etc.).
     * @param string               $path    Request path relative to baseUrl.
     * @param array<string, mixed> $options Request options passed directly to Guzzle client.
     *
     * @throws RuntimeException if Guzzle request fails.
     * @return Response
     */
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

    /**
     * Retrieve the hydrated model or array of models from an API Response.
     *
     * @param Response $response
     * @return array<int, object>|object|null
     */
    public function getStructuredBody(Response $response): array|object|null
    {
        return $response->getStructuredBody();
    }

    /**
     * Construct the absolute URL from base URL and path.
     *
     * @param string $path
     * @return string
     */
    private function buildUrl(string $path): string
    {
        return rtrim($this->baseUrl, '/') . '/' . ltrim($path, '/');
    }

    /**
     * Populate default headers, authorization credentials, and timeout options.
     *
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
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

    /**
     * Retrieve the current HTTP client or initialize a default Client.
     *
     * @return ClientInterface
     */
    private function getHttpClient(): ClientInterface
    {
        if ($this->httpClient instanceof ClientInterface) {
            return $this->httpClient;
        }

        $this->httpClient = new Client();

        return $this->httpClient;
    }

    /**
     * Ensure base URL is trimmed and ends with '/api'.
     *
     * @param string $baseUrl
     * @return string
     */
    private function normalizeBaseUrl(string $baseUrl): string
    {
        $baseUrl = rtrim($baseUrl, '/');
        if (substr($baseUrl, -4) !== '/api') {
            $baseUrl .= '/api';
        }

        return $baseUrl;
    }
}
