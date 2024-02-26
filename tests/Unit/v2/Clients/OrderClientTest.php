<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\TestData\Order\OrderTestData;
use Zendrop\ClickFunnelsApiClient\v2\Clients\OrderClient;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Order\OrderDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\CursorPaginator;

final class OrderClientTest extends ClientTestCase
{
    private OrderClient $orderClient;

    protected function setUp(): void
    {
        parent::setUp();
        $this->orderClient = new OrderClient(...$this->clientData);
    }

    public function testGetListPaginator(): void
    {
        $fakeResponseData = OrderTestData::getList();
        $ordersPaginator = $this->orderClient->getListPaginator();

        Http::fake([
            '/orders*' => Http::sequence()
                ->push([$fakeResponseData[0]], 200, ['Pagination-Next' => $fakeResponseData[1]['id']])
                ->push([$fakeResponseData[1]], 200),
        ]);

        $counter = 0;
        foreach ($ordersPaginator->getGenerator() as $order) {
            $this->assertInstanceOf(OrderDTO::class, $order);
            $counter++;
        }

        $this->assertEquals(2, $counter);
    }

    public function testGet(): void
    {
        $fakeResponseData = OrderTestData::getList()[0];

        Http::fake([
            '/orders/*' => Http::response($fakeResponseData),
        ]);

        $order = $this->orderClient->get($fakeResponseData['id']);
        $this->assertEquals($order->id, $fakeResponseData['id']);
    }
}
