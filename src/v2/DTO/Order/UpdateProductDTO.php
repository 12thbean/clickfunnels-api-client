<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO\Product;

use Zendrop\ClickFunnelsApiClient\v2\DTO\BaseDTO;

class UpdateProductDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $current_path = null,
        public readonly ?bool $visible_in_store = null,
        public readonly ?bool $visible_in_customer_center = null,
        public readonly ?string $seo_title = null,
        public readonly ?string $seo_description = null,
        public readonly ?string $seo_image_id = null,
        public readonly ?bool $commissionable = null,
        /** @var int[] $image_ids */
        public readonly ?array $image_ids = null,
        /** @var int[] $variant_ids */
        public readonly ?array $variant_ids = null,
        /** @var int[] $price_ids */
        public readonly ?array $price_ids = null,
        public readonly ?string $redirect_funnel_id = null,
        public readonly ?string $cancellation_funnel_url = null,
        /** @var string[] */
        public readonly array $fields = [],
    ) {
    }
}
