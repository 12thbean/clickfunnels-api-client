<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class CreateEndpointDTO extends BaseDTO
{
    public function __construct(
        public readonly string $url,
        public readonly string $name,
        /** @var string[] */
        public readonly array $eventTypeIds,
    ) {
    }
}
