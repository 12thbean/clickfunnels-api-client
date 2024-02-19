<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Contact;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\TagDTO;

class ContactDTO extends BaseDTO
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $workspace_id = null,
        public readonly ?string $uuid = null,

        public readonly ?string $public_id = null,
        public readonly ?string $anonymous = null,
        public readonly ?string $email_address = null,
        public readonly ?string $first_name = null,
        public readonly ?string $last_name = null,
        public readonly ?string $phone_number = null,
        public readonly ?string $time_zone = null,
        public readonly ?string $unsubscribed_at = null,
        public readonly ?string $last_notification_email_sent_at = null,
        public readonly ?string $fb_url = null,
        public readonly ?string $twitter_url = null,
        public readonly ?string $instagram_url = null,
        public readonly ?string $linkedin_url = null,
        public readonly ?string $website_url = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,

        /** @var array<int,TagDTO>|null */
        public readonly ?array $tags = null,

        mixed ...$data,
    ) {
        unset($data);
    }
}
