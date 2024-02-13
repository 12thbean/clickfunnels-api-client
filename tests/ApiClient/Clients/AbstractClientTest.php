<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\ApiClient\Clients;

use Illuminate\Support\Facades\Http;
use Zendrop\ClickFunnelsApiClient\Clients\ProductClient;
use Zendrop\ClickFunnelsApiClient\Clients\ProductClientInterface;
use Zendrop\ClickFunnelsApiClient\Tests\ApiClient\TestCase;

class AbstractClientTest extends TestCase
{
    /**
     * @dataProvider Zendrop\ClickFunnelsApiClient\Tests\DataProvider\ClickFunnels\ErrorResponseDataProvider::responses
     *
     * @param array<string, mixed>|null $body
     * @param int $status
     * @param string $expectedException
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function testClientExceptions(?array $body, int $status, string $expectedException): void
    {
        /** @var ProductClientInterface $productClient */
        $productClient = app(ProductClient::class, [
            'accessToken' => env('TEST_ACCESS_TOKEN'),
            'storeUrl' => env('TEST_STORE_URL'),
            'workspace' => env('TEST_WORKSPACE'),
        ]);

        $sequenceBuilder = Http::fakeSequence();
        $sequenceBuilder->push(body: $body, status: $status);
        try {
            $productClient->getList();
        } catch (\Throwable $exception) {
            $this->assertInstanceOf($expectedException, $exception);
        }
    }
}
