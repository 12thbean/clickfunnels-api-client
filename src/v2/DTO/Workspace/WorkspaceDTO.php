<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Workspace;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class WorkspaceDTO extends BaseDTO
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $team_id = null,
        public readonly ?string $name = null,
        public readonly ?string $subdomain = null,
        public readonly ?string $public_id = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
    ) {
    }
}
