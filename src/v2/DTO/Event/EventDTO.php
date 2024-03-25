<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Event;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class EventDTO extends BaseDTO
{
    public function __construct(
        public readonly string $eventId,
        public readonly string $eventType,
        public readonly int $subjectId,
        public readonly ?string $publicId = null,
        public readonly ?string $uuid = null,
        public readonly ?string $subjectType = null,
        /** @var null|array<string,mixed> */
        public readonly ?array $data = null,
        public readonly ?string $createdAt = null,
    ) {
    }
}
