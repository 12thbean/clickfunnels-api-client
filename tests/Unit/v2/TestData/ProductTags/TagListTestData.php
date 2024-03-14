<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductTags;

use JsonException;

final class TagListTestData
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
            "id": 851,
            "public_id": "QYOZyj",
            "workspace_id": 1421,
            "name": "Featured",
            "color": "#f2593d",
            "created_at": "2024-01-30T15:38:03.240Z",
            "updated_at": "2024-01-30T15:38:03.240Z"
          },
          {
            "id": 948,
            "public_id": "RNgeqj",
            "workspace_id": 1421,
            "name": "New",
            "color": "byzantium",
            "created_at": "2024-02-12T20:22:11.607Z",
            "updated_at": "2024-02-12T20:22:11.607Z"
          },
          {
            "id": 949,
            "public_id": "MNnDxj",
            "workspace_id": 1421,
            "name": "Limited",
            "color": "byzantium",
            "created_at": "2024-02-12T20:24:56.132Z",
            "updated_at": "2024-02-12T20:24:56.132Z"
          },
          {
            "id": 950,
            "public_id": "RNEVgJ",
            "workspace_id": 1421,
            "name": "Trending",
            "color": "byzantium",
            "created_at": "2024-02-12T20:25:28.210Z",
            "updated_at": "2024-02-12T20:25:28.210Z"
          }
        ]
JSON;

        return json_decode($jsonResponse, true, 512, JSON_THROW_ON_ERROR);
    }
}
