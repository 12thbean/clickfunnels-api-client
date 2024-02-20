<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Workspace;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class WorkspaceDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $team_id,
        public readonly string $name,
        public readonly string $subdomain,
        public readonly ?string $public_id = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
    ) {
    }
}
