<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Auth;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class AccessTokenDTO extends BaseDTO
{
    public function __construct(
        public readonly string $accessToken,
        public readonly string $tokenType,
        public readonly int $expiresIn,
        public readonly string $scope,
        public readonly int $createdAt,
        public readonly int $teamId,
        public readonly string $teamName,
        public readonly int $workspaceId,
        public readonly string $workspaceName,
        public readonly string $workspaceUrl,
        mixed ...$data,
    ) {
        unset($data);
    }
}
