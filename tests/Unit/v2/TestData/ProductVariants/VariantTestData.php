<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductVariants;

final class VariantTestData
{
    /**
     * @return array<string, mixed>
     */
    public static function variant(int $id = 15734, int $productId = 10320): array
    {
        $jsonResponse = <<<JSON
        {
          "id": 16051,
          "public_id": "jXEgAY",
          "product_id": 10320,
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
            850
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
JSON;

        $data = json_decode($jsonResponse, true);
        $data['id'] = $id;
        $data['product_id'] = $productId;

        return $data;
    }
}
