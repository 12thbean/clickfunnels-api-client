<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class EndpointDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $workspaceId,
        public readonly string $url,
        public readonly string $name,
        /** @var string[] */
        public readonly ?array $eventTypeIds = null,
        public readonly ?string $publicId = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
