<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Order;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Contact\ContactDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Contact\ContactGroupDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Pagination\PageDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Workspace\WorkspaceDTO;

class OrderDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $workspace_id,
        public readonly int $contact_id,
        public readonly string $currency,
        public readonly int $origination_channel_id,
        public readonly ContactDTO $contact,
        public readonly WorkspaceDTO $workspace,
        public readonly ?string $public_id = null,
        public readonly ?string $order_number = null,
        public readonly ?string $total_amount = null,
        public readonly ?string $origination_channel_type = null,
        public readonly ?string $shipping_address_first_name = null,
        public readonly ?string $shipping_address_last_name = null,
        public readonly ?string $shipping_address_organization_name = null,
        public readonly ?string $shipping_address_phone_number = null,
        public readonly ?string $shipping_address_street_one = null,
        public readonly ?string $shipping_address_street_two = null,
        public readonly ?string $shipping_address_city = null,
        public readonly ?string $shipping_address_region = null,
        public readonly ?string $shipping_address_country = null,
        public readonly ?string $shipping_address_postal_code = null,
        public readonly ?string $billing_address_street_one = null,
        public readonly ?string $billing_address_street_two = null,
        public readonly ?string $billing_address_city = null,
        public readonly ?string $billing_address_region = null,
        public readonly ?string $billing_address_country = null,
        public readonly ?string $billing_address_postal_code = null,
        public readonly ?int $page_id = null,
        public readonly ?string $notes = null,
        public readonly ?bool $in_trial = null,
        public readonly ?string $billing_status = null,
        public readonly ?string $service_status = null,
        public readonly ?string $order_type = null,
        public readonly ?string $next_charge_at = null,
        public readonly ?string $tax_amount = null,
        public readonly ?string $trial_end_at = null,
        public readonly ?string $billing_payment_method_id = null,
        public readonly ?string $funnel_name = null,
        public readonly ?string $activated_at = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?string $phone_number = null,
        public readonly ?string $page_name = null,
        public readonly ?string $origination_channel_name = null,
        public readonly ?string $previous_line_item = null,
        public readonly ?PageDTO $order_page = null,
        /** @var array<int,int>|null */
        public readonly ?array $tag_ids = null,
        /** @var array<int,int>|null */
        public readonly ?array $discount_ids = null,
        /** @var array<int,ContactGroupDTO> */
        public readonly ?array $contact_groups = null,
        /** @var array<int,SegmentDTO>|null */
        public readonly ?array $segments = null,
        /** @var array<int,LineItemDTO>|null */
        public readonly ?array $line_items = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}
