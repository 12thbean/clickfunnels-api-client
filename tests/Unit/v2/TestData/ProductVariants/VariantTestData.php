<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductVariants;

final class VariantTestData
{
    /**
     * @return array<string, mixed>
     * @throws \JsonException
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
          "product_type": "physical",
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
          "image_ids": [
            8501
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
          "fulfillments_location_ids": [
            14956
          ],
          "created_at": "2024-01-30T15:38:03.147Z",
          "updated_at": "2024-01-31T21:39:22.453Z",
          "default": false,
          "properties_values": [
            {
              "property_id": 99,
              "value": "Silver"
            }
          ]
        }
JSON;

        $data = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
        $data['id'] = $id;
        $data['product_id'] = $productId;

        return $data;
    }
}
