<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductCollections;

use JsonException;

final class ProductCollectionTestData
{
    /**
     * @param array<string, mixed> $item
     *
     * @return array<int, array<string, mixed>>
     * @throws JsonException
     */
    public static function list(array $item = []): array
    {
        return !empty($item) ? [$item] : [self::item()];
    }

    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function item(
        string $name = 'Example Collection',
        string $description = 'Example Description',
        bool $visibleInStore = true,
    ): array {
        $response = <<<JSON
        {
          "id": 19214,
          "public_id": "AcuVtv",
          "workspace_id": 42,
          "name": "Example Collection",
          "description": "Example Description",
          "collection_type": "manual",
          "product_ids": [],
          "sort_method": "manually",
          "archived": false,
          "image_id": null,
          "visible_in_store": true,
          "current_path": null,
          "seo_title": "Example SEO Title",
          "seo_description": "Example SEO Description",
          "seo_indexable": null,
          "social_image_id": null,
          "created_at": null,
          "updated_at": null
        }
JSON;

        $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        $data['name'] = $name;
        $data['description'] = $description;
        $data['visible_in_store'] = $visibleInStore;

        return $data;
    }
}
