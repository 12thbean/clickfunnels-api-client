<?php

namespace Zendrop\ClickFunnelsApiClient\DTO\Products;

use Zendrop\ClickFunnelsApiClient\DTO\BaseDTO;

class ProductDTO extends BaseDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $public_id,
        public readonly int $workspace_id,
        public readonly string $name,
        public readonly ?string $current_path,
        public readonly ?bool $archived,
        public readonly ?bool $visible_in_store,
        public readonly ?bool $visible_in_customer_center,
        public readonly ?string $image_id,
        public readonly ?string $seo_title,
        public readonly ?string $seo_description,
        public readonly ?string $seo_image_id,
        public readonly ?bool $commissionable,
        public readonly ?string $redirect_funnel_id,
        public readonly ?string $cancellation_funnel_url,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
        
        /** @var array<int,int> */
        public readonly ?array $image_ids,

        /** @var array<int,int> */
        public readonly ?array $variant_ids,

        /** @var array<int,int> */
        public readonly ?array $price_ids,

        /** @var array<int,int> */
        public readonly ?array $tag_ids,

        mixed ...$data,
    ) {
        unset($data);
    }
}
