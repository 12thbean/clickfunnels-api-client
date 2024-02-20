<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Tag;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class TagDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $workspace_id,
        public readonly string $name,
        public readonly string $color,
        public readonly ?string $public_id = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
