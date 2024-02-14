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
        public readonly ?int $id,
        public readonly ?string $public_id,
        public readonly ?string $order_number,
        public readonly int $workspace_id,
        public readonly int $contact_id,
        public readonly ?string $total_amount,
        public readonly string $currency,
        public readonly int $origination_channel_id,
        public readonly ?string $origination_channel_type,
        public readonly ?string $shipping_address_first_name,
        public readonly ?string $shipping_address_last_name,
        public readonly ?string $shipping_address_organization_name,
        public readonly ?string $shipping_address_phone_number,
        public readonly ?string $shipping_address_street_one,
        public readonly ?string $shipping_address_street_two,
        public readonly ?string $shipping_address_city,
        public readonly ?string $shipping_address_region,
        public readonly ?string $shipping_address_country,
        public readonly ?string $shipping_address_postal_code,
        public readonly ?string $billing_address_street_one,
        public readonly ?string $billing_address_street_two,
        public readonly ?string $billing_address_city,
        public readonly ?string $billing_address_region,
        public readonly ?string $billing_address_country,
        public readonly ?string $billing_address_postal_code,
        public readonly ?int $page_id,
        public readonly ?string $notes,
        public readonly ?bool $in_trial,
        public readonly ?string $billing_status,
        public readonly ?string $service_status,
        public readonly ?string $order_type,
        public readonly ?string $next_charge_at,
        public readonly ?string $tax_amount,
        public readonly ?string $trial_end_at,
        public readonly ?string $billing_payment_method_id,
        public readonly ?string $funnel_name,
        public readonly ?string $activated_at,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
        public readonly ?string $phone_number,
        public readonly ?string $page_name,
        public readonly ?string $origination_channel_name,
        public readonly ?string $previous_line_item,
        public readonly ?PageDTO $order_page,
        public readonly ?ContactDTO $contact,
        public readonly ?WorkspaceDTO $workspace,

        /** @var array<int,int>|null */
        public readonly ?array $tag_ids,

        /** @var array<int,int>|null */
        public readonly ?array $discount_ids,

        /** @var array<int,ContactGroupDTO> */
        public readonly ?array $contact_groups,

        /** @var array<int,SegmentDTO>|null */
        public readonly ?array $segments,

        /** @var array<int,LineItemDTO>|null */
        public readonly ?array $line_items, 

        mixed ...$data,
    ) {
        unset($data);
    }
}