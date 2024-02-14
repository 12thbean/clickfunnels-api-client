<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\DataProvider;

use Generator;
use Zendrop\ClickFunnelsApiClient\Exceptions\ConflictRequestException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ForbiddenException;
use Zendrop\ClickFunnelsApiClient\Exceptions\InvalidRequestException;
use Zendrop\ClickFunnelsApiClient\Exceptions\NotFoundException;
use Zendrop\ClickFunnelsApiClient\Exceptions\UnauthorizedException;
use Zendrop\ClickFunnelsApiClient\Exceptions\UnexpectedResponseException;
use Zendrop\ClickFunnelsApiClient\Exceptions\ValidationException;
use Zendrop\ClickFunnelsApiClient\Http\Packs\HttpCode;

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
            'status' => HttpCode::BAD_REQUEST->value,
            'expectedException' => InvalidRequestException::class,
        ];
        yield [
            'body' => [
                'error' => 'API key missing or invalid',
            ],
            'status' => HttpCode::HTTP_UNAUTHORIZED->value,
            'expectedException' => UnauthorizedException::class,
        ];
        yield [
            'body' => null,
            'status' => HttpCode::HTTP_FORBIDDEN->value,
            'expectedException' => ForbiddenException::class,
        ];
        yield [
            'body' => [
                'error' => 'Resource not found',
            ],
            'status' => HttpCode::HTTP_NOT_FOUND->value,
            'expectedException' => NotFoundException::class,
        ];
        yield [
            'body' => [
                'error' => 'Conflict request',
            ],
            'status' => HttpCode::HTTP_CONFLICT_REQUEST->value,
            'expectedException' => ConflictRequestException::class,
        ];
        yield [
            'body' => [
                'error' => [
                    'param' => 'error',
                ],
            ],
            'status' => HttpCode::HTTP_VALIDATION_ERROR->value,
            'expectedException' => ValidationException::class,
        ];
        yield [
            'body' => null,
            'status' => HttpCode::HTTP_OK->value,
            'expectedException' => UnexpectedResponseException::class,
        ];
    }
}
