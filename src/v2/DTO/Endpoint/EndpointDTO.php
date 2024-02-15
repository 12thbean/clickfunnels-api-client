<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Endpoint;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class EndpointDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $workspace_id,
        public readonly string $url,
        public readonly string $name,

        public readonly ?string $public_id = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,

        /** @var array<int,int> */
        public readonly ?array $event_type_ids = null,

        mixed ...$data,
    ) {
        unset($data);
    }
}
