<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Tag;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class TagDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $workspaceId,
        public readonly string $name,
        public readonly string $color,
        public readonly ?string $publicId = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
