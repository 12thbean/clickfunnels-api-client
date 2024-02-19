<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClientInterface;

class AbstractClientTest extends ClientTestCase
{
    /**
     * @dataProvider Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\DataProvider\ErrorResponseDataProvider::responses
     *
     * @param array<string, mixed>|null $body
     * @param int $status
     * @param string $expectedException
     * @return void
     */
    public function testClientExceptions(?array $body, int $status, string $expectedException): void
    {
        /** @var ProductClientInterface $productClient */
        $productClient = new ProductClient(...$this->clientData);

        $sequenceBuilder = Http::fakeSequence();
        $sequenceBuilder->push(body: $body, status: $status);
        try {
            $productClient->getList();
        } catch (\Throwable $exception) {
            $this->assertInstanceOf($expectedException, $exception);
        }
    }
}
