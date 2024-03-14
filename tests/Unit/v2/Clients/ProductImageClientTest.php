<?php

namespace Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients\ClientTestCase;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductImages\ImageListTestData;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\ProductImages\ImageTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductImageClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductImageClientInterface;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage\CreateImageDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage\UpdateImageDTO;

final class ProductImageClientTest extends ClientTestCase
{
    private ProductImageClientInterface $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new ProductImageClient(...$this->clientData);
    }

    public function testGetList(): void
    {
        $expectedList = ImageListTestData::list();
        $expectedCount = count($expectedList);

        Http::fake([
            '*/images*' => Http::response($expectedList),
        ]);

        $images = $this->client->getList();
        $this->assertCount($expectedCount, $images);
    }

    public function testGetById(): void
    {
        $expectedImageData = ImageTestData::image();
        $imageId = $expectedImageData['id'];

        Http::fake([
            '*/images/*' => Http::response($expectedImageData),
        ]);

        $image = $this->client->getById($imageId);
        $this->assertEquals($imageId, $image->id);
        $this->assertEquals($expectedImageData['name'], $image->name);
    }

    public function testCreate(): void
    {
        $payload = new CreateImageDTO(
            uploadSourceUrl: 'https://zendrop.com/wp-content/uploads/2023/03/zendrop-logo_dark.svg',
            altText: 'Zendrop logo',
            name: 'Zendrop',
        );

        Http::fake([
            '*/images*' => Http::response(ImageTestData::image(
                altText: $payload->altText,
                name: $payload->name,
            )),
        ]);

        $image = $this->client->create($payload);
        $this->assertEquals($payload->name, $image->name);
        $this->assertEquals($payload->altText, $image->altText);
    }

    public function testUpdate(): void
    {
        $imageId = 3127;
        $payload = new UpdateImageDTO(
            uploadSourceUrl: 'https://zendrop.com/wp-content/uploads/2023/03/zendrop-logo_dark.svg',
            name: 'Smartphone front view',
            altText: 'Front view of a smartphone',
        );

        Http::fake([
            '*/images/*' => Http::response(ImageTestData::image(
                id: $imageId,
                altText: $payload->altText,
                name: $payload->name,
            )),
        ]);

        $image = $this->client->update($imageId, $payload);
        $this->assertEquals($imageId, $image->id);
        $this->assertEquals($payload->name, $image->name);
        $this->assertEquals($payload->altText, $image->altText);
    }

    public function testDelete(): void
    {
        Http::fake([
            '*/images/*' => Http::response(null, 204),
        ]);

        $result = $this->client->delete('1');
        $this->assertTrue($result);
    }
}
