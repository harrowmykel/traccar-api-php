<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;
use PiccmaQ\TraccarApi\TraccarApi;

/**
 * Abstract base class for all Traccar API request builders.
 *
 * Concrete request classes extend this class and use the protected helper methods
 * ({@see requestGet()}, {@see requestPost()}, etc.) to communicate with the
 * Traccar REST API. Responses can optionally be hydrated into typed model objects
 * by calling {@see expectModel()} / {@see withModel()} before dispatching a request.
 */
abstract class Request
{
    protected TraccarApi $api;

    /** @var class-string|null Fully-qualified class name of the model to hydrate the response into. */
    protected ?string $responseModelClass = null;

    /** @var bool Whether the response body represents a collection (array) of models. */
    protected bool $isCollection = false;

    protected bool $acceptsJsonHeader = false;

    /**
     * @param TraccarApi $api The authenticated API client instance.
     */
    public function __construct(TraccarApi $api)
    {
        $this->api = $api;
    }

    /**
     * Configure the model class to hydrate the response into.
     *
     * When set, a successful response body will be decoded and mapped onto
     * one or more instances of the given model class via its {@see fromArray()}
     * factory method.
     *
     * @param class-string $modelClass  Fully-qualified class name of the response model.
     * @param bool         $isCollection Set to {@code true} when the response is a JSON array.
     *
     * @return static
     */
    public function expectModel(string $modelClass, bool $isCollection = false): self
    {
        $this->responseModelClass = $modelClass;
        $this->isCollection = $isCollection;

        return $this;
    }

    /**
     * Alias for {@see expectModel()}.
     *
     * @param class-string $modelClass  Fully-qualified class name of the response model.
     * @param bool         $isCollection Set to {@code true} when the response is a JSON array.
     *
     * @return static
     */
    public function withModel(string $modelClass, bool $isCollection = false): self
    {
        return $this->expectModel($modelClass, $isCollection);
    }

    public function acceptsJson(bool $acceptsJson = true): self
    {
        $this->acceptsJsonHeader = $acceptsJson;
        return $this;
    }

    /**
     * Send an HTTP GET request.
     *
     * @param string               $path  API path relative to the base URL (e.g. '/devices').
     * @param array<string, mixed> $query Query string parameters.
     */
    protected function requestGet(string $path, array $query = []): ApiResponse
    {
        return $this->executeRequest('GET', $path, ['query' => $query]);
    }

    /**
     * Send an HTTP POST request with a JSON body.
     *
     * @param string               $path API path relative to the base URL.
     * @param array<string, mixed> $data Request body fields.
     */
    protected function requestPost(string $path, array $data = []): ApiResponse
    {
        return $this->executeRequest('POST', $path, ['json' => $data]);
    }

    /**
     * Send an HTTP POST request with an application/x-www-form-urlencoded body.
     *
     * @param string               $path API path relative to the base URL.
     * @param array<string, mixed> $data Form fields.
     */
    protected function requestPostForm(string $path, array $data = []): ApiResponse
    {
        return $this->executeRequest('POST', $path, ['form_params' => $data]);
    }

    /**
     * Send an HTTP PUT request with a JSON body.
     *
     * @param string               $path API path relative to the base URL.
     * @param array<string, mixed> $data Request body fields.
     */
    protected function requestPut(string $path, array $data = []): ApiResponse
    {
        return $this->executeRequest('PUT', $path, ['json' => $data]);
    }

    /**
     * Send an HTTP DELETE request.
     *
     * @param string               $path  API path relative to the base URL.
     * @param array<string, mixed> $query Query string parameters (or body for bulk deletes).
     */
    protected function requestDelete(string $path, array $query = []): ApiResponse
    {
        return $this->executeRequest('DELETE', $path, ['query' => $query]);
    }

    /**
     * Execute an HTTP request and optionally hydrate the response into a model.
     *
     * @param string               $method  HTTP verb (GET, POST, PUT, DELETE, …).
     * @param string               $path    API path relative to the base URL.
     * @param array<string, mixed> $options Guzzle request options.
     */
    protected function executeRequest(string $method, string $path, array $options = []): ApiResponse
    {
        if ($this->acceptsJsonHeader) {
            $options['headers']['Accept'] = 'application/json';
        }
        $response = $this->api->request($method, $path, $options);
        return $this->hydrateResponse($response);
    }

    /**
     * Hydrate a raw API response into the configured model class.
     *
     * If no model class has been configured via {@see expectModel()}, or the
     * response is not successful, the original response is returned unchanged.
     *
     * @param ApiResponse $response The raw response from the API client.
     */
    protected function hydrateResponse(ApiResponse $response): ApiResponse
    {
        if (!$response->isSuccessful() || $this->responseModelClass === null) {
            return $response;
        }

        $data = $response->toArray();
        if ($data === []) {
            return $response;
        }

        try {
            if ($this->isCollection) {
                $models = [];
                if (is_array($data) && array_is_list($data)) {
                    foreach ($data as $item) {
                        if (is_array($item)) {
                            $models[] = $this->createModel($item);
                        }
                    }
                } elseif (is_array($data)) {
                    $models[] = $this->createModel($data);
                }

                $response->setStructuredBody($models);
            } else {
                $response->setStructuredBody($this->createModel($data));
            }
        } catch (\Throwable) {
            $response->setStructuredBody(null);
        }

        return $response;
    }

    /**
     * Instantiate the configured model class from an array of response data.
     *
     * If the model class exposes a {@code fromArray()} method it is used as a
     * factory; otherwise the array is passed directly to the constructor.
     *
     * @param array<string, mixed> $data Decoded JSON response data.
     *
     * @throws \RuntimeException When no model class is configured.
     */
    protected function createModel(array $data): object
    {
        $class = $this->responseModelClass;
        if ($class === null) {
            throw new \RuntimeException('No response model class configured.');
        }

        if (method_exists($class, 'fromArray')) {
            $instance = new $class();

            return $instance->fromArray($data);
        }

        return new $class($data);
    }
}
