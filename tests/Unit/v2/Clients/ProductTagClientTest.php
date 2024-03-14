<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductTags\CreateTagTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductTags\TagListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductTags\TagTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductTagClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductTagClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\CreateTagDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\UpdateTagDTO;

final class ProductTagClientTest extends ClientTestCase
{
    private ProductTagClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductTagClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedList = TagListTestData::list();

        Http::fake([
            '*/products/tags*' => Http::response($expectedList),
        ]);

        $list = $this->client->getList();
        $this->assertCount(count($expectedList), $list);
    }

    public function testGetById(): void
    {
        $expectedList = TagTestData::item();

        Http::fake([
            '*/products/tags*' => Http::response($expectedList),
        ]);

        $tag = $this->client->getById($expectedList['id']);

        $this->assertEquals($expectedList['id'], $tag->id);
        $this->assertEquals($expectedList['name'], $tag->name);
        $this->assertEquals($expectedList['color'], $tag->color);
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

    public function testUpdate(): void
    {
        $tagName = 'Test';
        $tagColor = 'byzantium';

        $payload = new UpdateTagDTO(
            name: $tagName,
            color: $tagColor,
        );

        Http::fake([
            '*/products/tags*' => Http::response(TagTestData::item(
                name: $tagName,
                color: $tagColor,
            )),
        ]);

        $tag = $this->client->update(TagTestData::item()['id'], $payload);
        $this->assertEquals($tagName, $tag->name);
        $this->assertEquals($tagColor, $tag->color);
    }

    public function testDelete(): void
    {
        Http::fake([
            '*/products/tags/*' => Http::response(null, 204),
        ]);

        $result = $this->client->delete(955);
        $this->assertTrue($result);
    }
}
