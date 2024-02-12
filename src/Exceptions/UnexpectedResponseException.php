<?php

namespace Zendrop\ClickFunnelsApiClient\Exceptions;

use Throwable;

class UnexpectedResponseException extends ClientException
{
    /**
     * Encrypted response body.
     *
     * @var string
     */
    public readonly string $responseBody;

    /**
     * @var string
     */
    protected $message = 'Unexpected response from Shopify API.';

    public function __construct(
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
        string $responseBody = ''
    ) {
        $this->responseBody = $responseBody;
        parent::__construct($message, $code, $previous);
    }
}
