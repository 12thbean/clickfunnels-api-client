<?php

namespace  Zendrop\ClickFunnelsApiClient\Tests\TestData\ProductTags;

use JsonException;

final class CreateTagTestData
{
    /**
     * @return array<string, mixed>
     * @throws JsonException
     */
    public static function create(string $name = 'Test', ?string $color = 'byzantium'): array
    {
        $jsonResponse = <<<JSON
        {
            "id":968,
            "public_id":"ejemGj",
            "workspace_id":1718,
            "name": "Product Tag",
            "color": "Color",
            "created_at":"2024-02-13T05:39:17.506Z",
            "updated_at":"2024-02-13T05:39:17.506Z"
        }
JSON;

        $data = json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
        $data['name'] = $name;
        $data['color'] = $color;

        return $data;
    }
}
