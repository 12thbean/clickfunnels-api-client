<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Products;

use JsonException;

final class ProductListTestData
{
    /**
     * @return array<int, array<string, mixed>>
     * @throws JsonException
     */
    public static function list(): array
    {
        $jsonResponse = <<<JSON
        [
          {
            "id": 9135,
            "public_id": "jvxgVN",
            "workspace_id": 1718,
            "default_variant_id": 19793,
            "name": "My Workspace's First Product",
            "current_path": "/my-workspace-s-first-product",
            "archived": false,
            "visible_in_store": true,
            "visible_in_customer_center": null,
            "image_id": null,
            "seo_title": null,
            "seo_description": null,
            "seo_image_id": null,
            "commissionable": true,
            "image_ids": [],
            "variant_ids": [
              16061
            ],
            "price_ids": [
              10631
            ],
            "tag_ids": [
              851
            ],
            "redirect_funnel_id": null,
            "cancellation_funnel_url": null,
            "created_at": "2024-01-30T15:38:03.144Z",
            "updated_at": "2024-01-31T21:39:22.457Z"
          },
          {
            "id": 9168,
            "public_id": "jeevMj",
            "workspace_id": 1718,
            "default_variant_id": 19794,
            "name": "Test product name",
            "current_path": "/test-product-name",
            "archived": false,
            "visible_in_store": true,
            "visible_in_customer_center": true,
            "image_id": null,
            "seo_title": "Test product name",
            "seo_description": "Test product name",
            "seo_image_id": null,
            "commissionable": true,
            "image_ids": [],
            "variant_ids": [
              16101,
              16102,
              16100
            ],
            "price_ids": [
              10664
            ],
            "tag_ids": [
              851
            ],
            "redirect_funnel_id": null,
            "cancellation_funnel_url": null,
            "created_at": "2024-01-31T17:31:45.398Z",
            "updated_at": "2024-01-31T21:39:29.064Z"
          },
          {
            "id": 9211,
            "public_id": "jzekyJ",
            "workspace_id": 1718,
            "default_variant_id": 19795,
            "name": "Test product name Physical",
            "current_path": "/test-product-name-physical",
            "archived": false,
            "visible_in_store": null,
            "visible_in_customer_center": null,
            "image_id": null,
            "seo_title": "Test product name Physical",
            "seo_description": "Test product name Physical",
            "seo_image_id": null,
            "commissionable": true,
            "image_ids": [],
            "variant_ids": [
              16161
            ],
            "price_ids": [
              10704
            ],
            "tag_ids": [],
            "redirect_funnel_id": null,
            "cancellation_funnel_url": null,
            "created_at": "2024-02-05T12:18:26.379Z",
            "updated_at": "2024-02-05T12:18:35.249Z"
          }
        ]
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
