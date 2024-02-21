<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class EndpointDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $url,
        public readonly string $name,
        public readonly int $workspaceId,
        public readonly ?string $publicId = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        /** @var array<int,int> */
        public readonly ?array $eventTypeIds = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
