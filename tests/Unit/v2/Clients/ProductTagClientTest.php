<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductTags\CreateTagTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductTagClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductTagClientInterface;
use Zendrop\ClickFunnelsApiClient\Tests\TestCase;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\TagDTO;

final class ProductTagClientTest extends ClientTestCase
{
    private ProductTagClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductTagClient(...$this->clientData);
    }

    public function testCreate(): void
    {
        $tagName = 'Test';
        $tagColor = 'byzantium';

        $payload = new TagDTO(
            name: $tagName,
            color: $tagColor,
        );

        Http::fake([
            '*/products/tags*' => Http::response(CreateTagTestData::create()),
        ]);

        $tag = $this->client->create($payload);
        $this->assertEquals($tagName, $tag->name);
        $this->assertEquals($tagColor, $tag->color);
    }
}
