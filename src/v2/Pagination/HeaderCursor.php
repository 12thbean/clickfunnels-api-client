<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Pagination;

use Illuminate\Http\Client\Response;

class HeaderCursor
{
    protected ?int $currentPointerValue = null;

    public function __construct(
        protected ?int $nextPointerValue = null,
        public readonly ?RequestContextDTO $requestContextDTO = null,
    ) {
    }

    public function getCurrent(): ?int
    {
        return $this->currentPointerValue;
    }

    public function getNext(): ?int
    {
        return $this->nextPointerValue;
    }

    /**
     * Set pointers according to Response header
     */
    public function setNext(Response $response): ?int
    {
        $this->currentPointerValue = $this->nextPointerValue;

        $headerValue = $response->header('Pagination-Next');
        $this->nextPointerValue = $headerValue
            ? (int)$headerValue
            : null;

        return $this->nextPointerValue;
    }
}
