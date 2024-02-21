<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Workspace;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class WorkspaceDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $teamId,
        public readonly string $name,
        public readonly string $subdomain,
        public readonly ?string $publicId = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    ) {
    }
}
