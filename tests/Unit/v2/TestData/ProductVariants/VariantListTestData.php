<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductVariants;

use JsonException;

final class VariantListTestData
{
    /**
     * @return array<int, array<string, mixed>>
     * @throws JsonException
     */
    public static function list(int $productId = 13042): array
    {
        $responseJson = <<<JSON
        [
          {
            "id": 19261,
            "public_id": "jXRgNY",
            "product_id": 13042,
            "name": "My Workspace's First Product",
            "sku": null,
            "properties_value_ids": [],
            "out_of_stock_sales": null,
            "weight": "0.1",
            "weight_unit": "lb",
            "height": null,
            "width": null,
            "length": null,
            "dimensions_unit": null,
            "quantity": 0,
            "tag_ids": [
              851
            ],
            "tax_category_id": null,
            "asset_ids": [],
            "taxable": null,
            "track_quantity": false,
            "archived": false,
            "visible": true,
            "price_ids": [
              10631
            ],
            "fulfillment_required": false,
            "country_of_manufacture_id": null,
            "created_at": "2024-01-30T15:38:03.147Z",
            "updated_at": "2024-01-31T21:39:22.453Z"
          }
        ]
JSON;

        $list = json_decode($responseJson, true, 512, JSON_THROW_ON_ERROR);
        foreach ($list as &$variant) {
            $variant['product_id'] = $productId;
        }

        return $list;
    }
}
