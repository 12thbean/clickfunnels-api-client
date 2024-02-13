<?php

namespace Zendrop\ClickFunnelsApiClient\Clients;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;
use Zendrop\ClickFunnelsApiClient\Exceptions\ClientException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ConflictRequestException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ForbiddenException;
use Zendrop\ClickFunnelsApiClient\Exceptions\InvalidRequestException;
use Zendrop\ClickFunnelsApiClient\Exceptions\NotFoundException;
use Zendrop\ClickFunnelsApiClient\Exceptions\UnauthorizedException;
use Zendrop\ClickFunnelsApiClient\Exceptions\UnexpectedResponseException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ValidationException;

abstract class AbstractClient
{
    public const HTTP_OK = 200;
    public const BAD_REQUEST = 400;
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_CONFLICT_REQUEST = 409;
    public const HTTP_VALIDATION_ERROR = 422;

    protected const GET = 'get';
    protected const POST = 'post';
    protected const PUT = 'put';
    protected const DELETE = 'delete';

    private readonly string $apiVersion;

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
        private readonly string $storeUrl,
        private readonly string $workspace,
    ) {
        //TODO: Change on config -> clickfunnels->api_version;
        $this->apiVersion = 'v2';
    }

    /**
     * Sends shopify requests and handles its status.
     *
     * @param string $resource
     * @param string $method
     * @param array<string, mixed> $payload
     *
     * @return Response
     * @throws ClientException
     */
    protected function sendRequest(
        string $resource,
        string $method = self::GET,
        array $payload = [],
    ): Response {
        $url = $this->generateRequestUrl($resource, $method, $payload);

        $options = !in_array($method, [self::GET, self::DELETE]) ? ['json' => $payload] : [];
        $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->accessToken,
            ])
            ->send($method, $url, $options);

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
     *
     * @return string
     */
    private function generateRequestUrl(string $resource, string $method, array $payload): string
    {
        $resource = trim($resource, '/');
        $url = "https://$this->storeUrl/api/$this->apiVersion/workspaces/$this->workspace/$resource";

        if (!empty($payload) && in_array($method, [self::GET, self::DELETE])) {
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
     * @return void
     * @throws ClientException
     */
    private function handleResponseError(Response $response, string $resource, array $payload): void
    {
        if ($response->status() === self::BAD_REQUEST) {
            $this->log('Invalid request', $resource, $payload, $response);
            throw new InvalidRequestException($response->json()['error'] ?? '');
        }

        if ($response->status() === self::HTTP_UNAUTHORIZED) {
            $this->log('Unauthorized request', $resource, $payload, $response);
            throw new UnauthorizedException();
        }

        if ($response->status() === self::HTTP_FORBIDDEN) {
            $this->log('Forbidden', $resource, $payload, $response);
            throw new ForbiddenException();
        }

        if ($response->status() === self::HTTP_NOT_FOUND) {
            $this->log('Resource not found', $resource, $payload, $response);
            throw new NotFoundException('Resource not found.');
        }

        if ($response->status() === self::HTTP_CONFLICT_REQUEST) {
            $this->log('Conflict request', $resource, $payload, $response);
            throw new ConflictRequestException();
        }

        if ($response->status() === self::HTTP_VALIDATION_ERROR) {
            $this->log('Validation error', $resource, $payload, $response);
            throw new ValidationException();
        }

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
            'storeUrl' => $this->storeUrl,
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
