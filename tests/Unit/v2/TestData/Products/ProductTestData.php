<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Products;

use JsonException;

final class ProductTestData
{
    /**
     * @param int $id
     * @param string $name
     * @param bool $visibleInStore
     * @param bool $visibleInCustomerCenter
     * @param string $seoTitle
     * @param bool $archived
     *
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function product(
        int $id = 10130,
        string $name = "My Workspace's First Product",
        bool $visibleInStore = false,
        bool $visibleInCustomerCenter = false,
        string $seoTitle = 'Test Product',
        bool $archived = false,
    ): array {
        $jsonResponse = <<<JSON
        {
            "id":10130,
            "public_id":"jvxrVN",
            "workspace_id":1718,
            "default_variant_id": 19793,
            "name":"My Workspace's First Product",
            "current_path":"/my-workspace-s-first-product",
            "archived":false,
            "visible_in_store":true,
            "visible_in_customer_center":null,
            "image_id":null,
            "seo_title":null,
            "seo_description":null,
            "seo_image_id":null,
            "commissionable":true,
            "image_ids":[],
            "variant_ids":[16061],
            "price_ids":[10631],
            "tag_ids":[851],
            "redirect_funnel_id":null,
            "cancellation_funnel_url":null,
            "variant_properties": [
                {
                    "id": 16061,
                    "name": "Color"
                }
            ],
            "created_at":"2024-01-30T15:38:03.144Z",
            "updated_at":"2024-01-31T21:39:22.457Z"
        }
JSON;

        $data = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
        $data['id'] = $id;
        $data['name'] = $name;
        $data['visible_in_store'] = $visibleInStore;
        $data['visible_in_customer_center'] = $visibleInCustomerCenter;
        $data['seo_title'] = $seoTitle;
        $data['archived'] = $archived;

        return $data;
    }
}
