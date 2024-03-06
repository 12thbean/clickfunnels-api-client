<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductImages;

final class ImageTestData
{
    /**
     * @param int $id
     * @param string $url
     * @param string $altText
     * @param string $name
     *
     * @return array<string, mixed>
     */
    public static function image(
        int $id = 1,
        string $url = 'https://example.com/image1.jpg',
        string $altText = 'Image 1 alt text',
        string $name = 'Image 1 name',
    ): array {
        return [
            'id' => $id,
            'workspace_id' => 1,
            'url' => $url,
            'public_id' => '314fdaaaE',
            'alt_text' => $altText,
            'name' => $name,
            'createdAt' => '2024-01-31T17:31:45.398Z',
            'updatedAt' => '2024-01-31T17:31:45.398Z',
        ];
    }
}
