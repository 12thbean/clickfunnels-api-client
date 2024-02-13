<?php

namespace Zendrop\ClickFunnelsApiClient;

use Zendrop\ClickFunnelsApiClient\Clients\ProductClient;
use Zendrop\ClickFunnelsApiClient\Clients\AbstractClient;

class ClickFunnelsApi
{
    /** @var array<string, array<string, AbstractClient>> */
    private static array $registry = [];

    public function __construct(
        private readonly string $accessToken,
        private readonly string $storeUrl,
        private readonly string $workspace,
    ) {
        // TODO: Change on config -> clickfunnels->api_version;
        // $this->apiVersion = 'v2';
    }

    public function product(): ProductClient
    {
        return $this->make(ProductClient::class, $this->accessToken, $this->storeUrl, $this->workspace);
    }

    /**
     * @template TClient of AbstractClient
     * 
     * @param class-string<TClient> $class
     * @return TClient
     */
    private function make(string $class, string $accessToken, string $storeUrl, string $workspace): AbstractClient
    {
        return self::$registry[$class][$storeUrl] ?? new $class($accessToken, $storeUrl, $workspace);
    }

    public static function fake(string $class, string $shopUrl, AbstractClient $instance): void
    {
        self::$registry[$class][$shopUrl] = $instance;
    }
}