<?php

namespace Zendrop\ClickFunnelsApiClient;

use Zendrop\ClickFunnelsApiClient\v2\Clients\AbstractClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\AuthClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductImageClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductPriceClient;
use Zendrop\ClickFunnelsApiClient\v2\Clients\ProductTagClient;

class ClickFunnelsClient
{
    /** @var array<string, array<string, AbstractClient>> */
    private static array $registry = [];

    public function __construct(
        private readonly string $accessToken,
        private readonly string $workspaceUrl,
        private readonly string $workspaceId,
    ) {
    }

    public static function fake(string $class, string $workspaceId, AbstractClient $instance): void
    {
        self::$registry[$class][$workspaceId] = $instance;
    }

    public function auth(): AuthClient
    {
        return $this->make(AuthClient::class);
    }

    public function product(): ProductClient
    {
        return $this->make(ProductClient::class);
    }

    public function productImage(): ProductImageClient
    {
        return $this->make(ProductImageClient::class);
    }

    public function productTag(): ProductTagClient
    {
        return $this->make(ProductTagClient::class);
    }

    public function productPrice(): ProductPriceClient
    {
        return $this->make(ProductPriceClient::class);
    }

    /**
     * @template TClient of AbstractClient
     * @param class-string<TClient> $class
     * @return TClient
     */
    private function make(string $class): AbstractClient
    {
        return self::$registry[$class][$this->workspaceId] ??
            new $class($this->accessToken, $this->workspaceUrl, $this->workspaceId);
    }
}
