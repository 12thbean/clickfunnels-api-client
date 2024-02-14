<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Products;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class ProductDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $public_id = null,
        public readonly ?int $workspace_id = null,
        public readonly ?string $name = null,
        public readonly ?string $current_path = null,
        public readonly ?bool $archived = null,
        public readonly ?bool $visible_in_store = null,
        public readonly ?bool $visible_in_customer_center = null,
        public readonly ?int $image_id = null,
        public readonly ?string $seo_title = null,
        public readonly ?string $seo_description = null,
        public readonly ?int $seo_image_id = null,
        public readonly ?bool $commissionable = null,
        /** @var int[] $image_ids */
        public readonly ?array $image_ids = null,
        /** @var int[] $variant_ids */
        public readonly ?array $variant_ids = null,
        /** @var int[] $price_ids */
        public readonly ?array $price_ids = null,
        /** @var int[] $tag_ids */
        public readonly ?array $tag_ids = null,
        public readonly ?int $redirect_funnel_id = null,
        public readonly ?string $cancellation_funnel_url = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        mixed ...$data,
    ) {
        unset($data);
    }
}