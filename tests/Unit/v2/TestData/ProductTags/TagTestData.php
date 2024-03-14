<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductTags;

use JsonException;

final class TagTestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function item(
        string $name = 'Featured',
        string $color = '#f2593d',
    ): array {
        $jsonResponse = <<<JSON
        {
            "id": 851,
            "public_id": "QYOZyj",
            "workspace_id": 1421,
            "name": "Featured",
            "color": "#f2593d",
            "created_at": "2024-01-30T15:38:03.240Z",
            "updated_at": "2024-01-30T15:38:03.240Z"
        }
JSON;

        $data = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
        $data['name'] = $name;
        $data['color'] = $color;

        return $data;
    }
}
