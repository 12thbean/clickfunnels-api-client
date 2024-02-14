<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Workspaces;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

class WorkspaceDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $public_id,
        public readonly int $team_id,
        public readonly string $name,
        public readonly string $subdomain,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {
    }
}
