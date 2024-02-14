<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Contact;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ContactDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $public_id,
        public readonly int $workspace_id,
        public readonly ?string $anonymous,
        public readonly ?string $email_address,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $phone_number,
        public readonly ?string $time_zone,
        public readonly string $uuid,
        public readonly ?string $unsubscribed_at,
        public readonly ?string $last_notification_email_sent_at,
        public readonly ?string $fb_url,
        public readonly ?string $twitter_url,
        public readonly ?string $instagram_url,
        public readonly ?string $linkedin_url,
        public readonly ?string $website_url,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,

        /** @var array<int,ContactTagDTO>|null */
        public readonly ?array $tags,

        mixed ...$data,
    ) {
        unset($data);
    }
}
