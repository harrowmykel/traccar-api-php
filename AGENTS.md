# Agent Developer Guide (AGENTS.md)

Welcome! This document helps AI developer agents get up to speed quickly with the codebase without having to read every file.

---

## 1. Overview
This codebase is a clean, PSR-compatible PHP client library for the [Traccar GPS tracking platform REST API](https://www.traccar.org/api-reference/).

- **Target PHP Version:** 8.1+
- **Namespace:** `PiccmaQ\TraccarApi`
- **Main Client Entrypoint:** [TraccarApi.php](file:///c:/Users/harro/git/traccar-api-laravel/traccar-api-php/src/TraccarApi.php)
- **HTTP Client:** [Guzzle HTTP](https://github.com/guzzle/guzzle) (`GuzzleHttp\ClientInterface`)

---

## 2. Directory Structure

```text
src/
├── Models/             # Domain entities/data transfer objects (e.g., DeviceModel, PositionModel)
├── Requests/           # Resource-specific API request builders
│   ├── Request.php     # Abstract base request class (performs HTTP requests & model hydration)
│   └── ...             # Concrete builders (e.g., DeviceRequest, SessionRequest)
├── Responses/          # Wrapper classes for API responses
│   └── Response.php    # PSR Response decorator supporting JSON decoding and typed body hydration
└── TraccarApi.php      # Main client. Manages auth, Guzzle instance, base URL, and returns builders.

tests/
├── Integration/        # Integration tests making real or full-stack requests
└── Unit/               # Unit tests checking correct URL construction, params, and response hydration
```

---

## 3. Core Architecture & Workflow

### 3.1 Client Instantiation & Auth
The client [TraccarApi](file:///c:/Users/harro/git/traccar-api-laravel/traccar-api-php/src/TraccarApi.php) supports three authentication modes:
- **Bearer Token:** `TraccarApi::withAuthorizationToken($token)`
- **Email & Password (Basic Auth):** `TraccarApi::withEmailPassword($email, $password)`
- **Unauthenticated:** `TraccarApi::noAuth()`

### 3.2 Fluent Requests
API interactions flow fluently from the main client using resource-specific methods that return request builders:
```php
$api = TraccarApi::withAuthorizationToken('my-token');

// 1. Calling ->devices() returns a DeviceRequest instance
// 2. Calling ->list() returns a Response instance
$response = $api->devices()->list();

// 3. Retrieve hydrated models
$devices = $response->getStructuredBody(); // returns array of DeviceModel
```

---

## 4. Response Hydration

Requests automatically configure expected models using the `expectModel(string $modelClass, bool $isCollection = false)` method inherited from `PiccmaQ\TraccarApi\Requests\Request`.

1. **Hydration Phase:** When `executeRequest()` completes, it runs `hydrateResponse()`.
2. **Factory Check:** If the model class has a `fromArray()` method, it will instantiate the model and run `fromArray($data)`. Otherwise, it passes the array to the model's constructor: `new $modelClass($data)`.
3. **Structured Body:** The populated model/array of models is saved inside the `Response` and retrieved via `$response->getStructuredBody()`.

---

## 5. Adding New Endpoints

To add a new endpoint or resource:

1. **Create the Request Builder:** Create a new class under `src/Requests/` extending `PiccmaQ\TraccarApi\Requests\Request`.
2. **Define Methods:** Implement methods utilizing protected request helpers (`requestGet()`, `requestPost()`, etc.) and set the expected return model with `expectModel()`.
3. **Register on the Main Client:** Add a public method returning your builder instance in [TraccarApi.php](file:///c:/Users/harro/git/traccar-api-laravel/traccar-api-php/src/TraccarApi.php).
4. **Create Model (Optional):** If the endpoint returns a new data structure, create a model in `src/Models/`.

---

## 6. Testing

### Run Tests
```bash
# Windows
composer tests_windows

# Linux / macOS
composer tests
```

### Mocking Responses in Tests
All unit tests extend `PiccmaQ\TraccarApi\Tests\TestCase` which provides helper methods for mocking Guzzle client responses:
- `mockResponse(int $statusCode, array|string $body, array $headers = [])`: Mocks a single response.
- `mockHttpClient(array $responses)`: Mocks multiple sequential responses.
