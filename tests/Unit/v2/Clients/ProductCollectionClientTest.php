<?php

namespace Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients\ClientTestCase;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductCollections\ProductCollectionTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductCollectionClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductCollectionClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection\CreateProductCollectionDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection\UpdateProductCollectionDTO;

final class ProductCollectionClientTest extends ClientTestCase
{
    private ProductCollectionClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductCollectionClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedList = ProductCollectionTestData::list();
        $expectedCount = count($expectedList);

        Http::fake([
            '*/products/collections*' => Http::response($expectedList),
        ]);

        $collections = $this->client->getList();
        $this->assertCount($expectedCount, $collections);
    }

    public function testCreate(): void
    {
        $payload = new CreateProductCollectionDTO(
            name: 'Watches',
            description: 'Electronic Watches',
            visibleInStore: false,
        );

        $mockedResponse = ProductCollectionTestData::item(
            name: 'Watches',
            description: 'Electronic Watches',
            visibleInStore: false,
        );

        Http::fake([
            '*/products/collections*' => Http::response($mockedResponse),
        ]);

        $collection = $this->client->create($payload);
        $this->assertEquals($payload->name, $collection->name);
        $this->assertEquals($payload->description, $collection->description);
        $this->assertEquals($payload->visibleInStore, $collection->visibleInStore);
    }

    public function testGetById(): void
    {
        $expectedCollectionData = ProductCollectionTestData::item();
        $collectionId = $expectedCollectionData['id'];

        Http::fake([
            '*/products/collections*' => Http::response($expectedCollectionData),
        ]);

        $collection = $this->client->getById($collectionId);
        $this->assertEquals($collectionId, $collection->id);
        $this->assertEquals($expectedCollectionData['name'], $collection->name);
    }

    public function testUpdate(): void
    {
        $payload = new UpdateProductCollectionDTO(
            name: 'Electronic Watches',
            description: 'Electronic Watches 2024',
        );

        $mockedResponse = ProductCollectionTestData::item(
            name: $payload->name,
            description: $payload->description,
        );

        Http::fake([
            '*/products/collections/*' => Http::response($mockedResponse),
        ]);

        $collection = $this->client->update(1, $payload);
        $this->assertEquals($payload->name, $collection->name);
        $this->assertEquals($payload->description, $collection->description);
    }
}
