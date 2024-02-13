<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\DataProvider\ClickFunnels;

use Generator;
use Zendrop\ClickFunnelsApiClient\Clients\AbstractClient;
use Zendrop\ClickFunnelsApiClient\Exceptions\ConflictRequestException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ForbiddenException;
use Zendrop\ClickFunnelsApiClient\Exceptions\InvalidRequestException;
use Zendrop\ClickFunnelsApiClient\Exceptions\NotFoundException;
use Zendrop\ClickFunnelsApiClient\Exceptions\UnauthorizedException;
use Zendrop\ClickFunnelsApiClient\Exceptions\UnexpectedResponseException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ValidationException;

final class ErrorResponseDataProvider
{
    /**
     * @return Generator
     */
    public function responses(): Generator
    {
        yield [
            'body' => [
                'error' => 'Bad request: param is missing or the value is empty: {param_name}',
            ],
            'status' => AbstractClient::BAD_REQUEST,
            'expectedException' => InvalidRequestException::class,
        ];
        yield [
            'body' => [
                'error' => 'API key missing or invalid',
            ],
            'status' => AbstractClient::HTTP_UNAUTHORIZED,
            'expectedException' => UnauthorizedException::class,
        ];
        yield [
            'body' => null,
            'status' => AbstractClient::HTTP_FORBIDDEN,
            'expectedException' => ForbiddenException::class,
        ];
        yield [
            'body' => [
                'error' => 'Resource not found',
            ],
            'status' => AbstractClient::HTTP_NOT_FOUND,
            'expectedException' => NotFoundException::class,
        ];
        yield [
            'body' => [
                'error' => 'Conflict request',
            ],
            'status' => AbstractClient::HTTP_CONFLICT_REQUEST,
            'expectedException' => ConflictRequestException::class,
        ];
        yield [
            'body' => [
                'error' => [
                    'param' => 'error',
                ],
            ],
            'status' => AbstractClient::HTTP_VALIDATION_ERROR,
            'expectedException' => ValidationException::class,
        ];
        yield [
            'body' => null,
            'status' => AbstractClient::HTTP_OK,
            'expectedException' => UnexpectedResponseException::class,
        ];
    }
}
