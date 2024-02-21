<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Contact;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\TagDTO;

class ContactDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $workspaceId,
        public readonly string $uuid,
        public readonly ?string $publicId = null,
        public readonly ?string $anonymous = null,
        public readonly ?string $emailAddress = null,
        public readonly ?string $firstName = null,
        public readonly ?string $lastName = null,
        public readonly ?string $phoneNumber = null,
        public readonly ?string $timeZone = null,
        public readonly ?string $unsubscribedAt = null,
        public readonly ?string $lastNotificationEmailSentAt = null,
        public readonly ?string $fbUrl = null,
        public readonly ?string $twitterUrl = null,
        public readonly ?string $instagramUrl = null,
        public readonly ?string $linkedinUrl = null,
        public readonly ?string $websiteUrl = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        /** @var array<int,TagDTO>|null */
        public readonly ?array $tags = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
