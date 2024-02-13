<?php

namespace ApiClient\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Clients\ProductTagClient;
use Zendrop\ClickFunnelsApiClient\Clients\ProductTagClientInterface;
use Zendrop\ClickFunnelsApiClient\DTO\ProductTags\CreateTagDTO;
use Zendrop\ClickFunnelsApiClient\Tests\ApiClient\TestCase;
use Zendrop\ClickFunnelsApiClient\Tests\TestData\ProductTags\CreateTagTestData;

final class ProductTagClientTest extends TestCase
{
    private ProductTagClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = app(ProductTagClient::class, [
            'accessToken' => env('TEST_ACCESS_TOKEN'),
            'storeUrl' => env('TEST_STORE_URL'),
            'workspace' => env('TEST_WORKSPACE'),
        ]);
    }

    public function testCreate(): void
    {
        $tagName = 'Test';
        $tagColor = 'byzantium';

        $payload = new CreateTagDTO(
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
