<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;
use Zendrop\ClickFunnelsApiClient\ApiVersion;
use Zendrop\ClickFunnelsApiClient\Exceptions\ClientException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ConflictRequestException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ForbiddenException;
use Zendrop\ClickFunnelsApiClient\Exceptions\InvalidRequestException;
use Zendrop\ClickFunnelsApiClient\Exceptions\NotFoundException;
use Zendrop\ClickFunnelsApiClient\Exceptions\UnauthorizedException;
use Zendrop\ClickFunnelsApiClient\Exceptions\UnexpectedResponseException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ValidationException;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpCode;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpMethod;

abstract class AbstractClient
{
    private readonly ApiVersion $apiVersion;

    /**
     * Filter header keys to be logged.
     * @var string[]
     */
    private const LOG_HEADER_BLACK_LIST = [
        'Date',
        'Content-Type',
        'Transfer-Encoding',
        'Connection',
        'Cache-Control',
        'ETag',
        'Vary',
        'Referrer-Policy',
        'X-Frame-Options',
        'Strict-Transport-Security',
        'Server-Timing',
        'X-Shopify-Stage',
        'Content-Security-Policy',
        'X-Content-Type-Options',
        'X-Download-Options',
        'X-Permitted-Cross-Domain-Policies',
        'X-Request-Id',
        'X-XSS-Protection',
        'X-Dc',
        'CF-Cache-Status',
        'Report-To',
        'NEL',
        'Server',
        'CF-RAY',
        'alt-svc',
    ];

    public function __construct(
        private readonly string $accessToken,
        private readonly string $workspaceUrl,
        private readonly string $workspaceId,
    ) {
        $this->apiVersion = ApiVersion::V2;
    }

    /**
     * Sends shopify requests and handles its status.
     *
     * @param string $resource
     * @param HttpMethod $method
     * @param array<string, mixed> $payload
     * @param bool $workspaceRequest
     *
     * @return Response
     * @throws ClientException
     */
    protected function sendRequest(
        string $resource,
        HttpMethod $method = HttpMethod::GET,
        array $payload = [],
        bool $workspaceRequest = false,
        ?string $customUrl = null,
    ): Response {
        $requestMethod = $method->value;

        $url = $customUrl ?? $this->generateRequestUrl($resource, $requestMethod, $payload, $workspaceRequest);

        $options = !in_array($requestMethod, [
            HttpMethod::GET->value,
            HttpMethod::DELETE->value,
        ], true) ? ['json' => $payload] : [];

        $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->accessToken,
            ])
            ->send($requestMethod, $url, $options);

        if (!$response->successful() || !$response->json()) {
            $this->handleResponseError(
                response: $response,
                resource: $resource,
                payload: $payload,
            );
        }

        return $response;
    }

    /**
     * Generates request URL to requested resource.
     *
     * @param string $resource
     * @param string $method
     * @param array<string, mixed> $payload
     * @param bool $workspaceRequest
     * @return string
     */
    private function generateRequestUrl(
        string $resource,
        string $method,
        array $payload,
        bool $workspaceRequest,
    ): string {
        $resource = trim($resource, '/');

        if ($workspaceRequest) {
            $url = "https://$this->workspaceUrl/api/{$this->apiVersion->value}/workspaces/$this->workspaceId/$resource";
        } else {
            $url = "https://$this->workspaceUrl/api/{$this->apiVersion->value}/$resource";
        }

        $getOrDelete = in_array($method, [HttpMethod::GET->value, HttpMethod::DELETE->value], true);
        if (!empty($payload) && $getOrDelete) {
            $url .= '?' . http_build_query($payload);
        }

        return $url;
    }

    /**
     * Resolves exceptions based on failed response.
     *
     * @param Response $response
     * @param string $resource
     * @param array<string, mixed> $payload
     *
     * @return never
     * @throws ClientException
     */
    private function handleResponseError(Response $response, string $resource, array $payload): never
    {
        if ($response->status() === HttpCode::BAD_REQUEST->value) {
            $this->log('Invalid request', $resource, $payload, $response);
            throw new InvalidRequestException($response->json()['error'] ?? '');
        }

        if ($response->status() === HttpCode::HTTP_UNAUTHORIZED->value) {
            $this->log('Unauthorized request', $resource, $payload, $response);
            throw new UnauthorizedException();
        }

        if ($response->status() === HttpCode::HTTP_FORBIDDEN->value) {
            $this->log('Forbidden', $resource, $payload, $response);
            throw new ForbiddenException();
        }

        if ($response->status() === HttpCode::HTTP_NOT_FOUND->value) {
            $this->log('Resource not found', $resource, $payload, $response);
            throw new NotFoundException('Resource not found.');
        }

        if ($response->status() === HttpCode::HTTP_CONFLICT_REQUEST->value) {
            $this->log('Conflict request', $resource, $payload, $response);
            throw new ConflictRequestException();
        }

        if ($response->status() === HttpCode::HTTP_VALIDATION_ERROR->value) {
            $this->log('Validation error', $resource, $payload, $response);
            throw new ValidationException();
        }

        $this->log('Unexpected response', $resource, $payload, $response);
        throw new UnexpectedResponseException(responseBody: $response->body());
    }

    /**
     * Logs unsuccessful requests.
     *
     * @param string $message
     * @param string $resource
     * @param array<string, mixed> $payload
     * @param Response $response
     * @return void
     */
    private function log(string $message, string $resource, array $payload, Response $response): void
    {
        Log::warning(sprintf('%s: %s', static::class, $message), [
            'storeUrl' => $this->workspaceUrl,
            'resource' => $resource,
            'payload' => $payload,
            'response' => [
                'status' => $response->status(),
                'header' => Arr::except($response->headers(), self::LOG_HEADER_BLACK_LIST),
                'body' => $response->body(),
            ],
            'client' => static::class,
        ]);
    }
}
