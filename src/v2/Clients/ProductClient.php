<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;

class ProductClient extends AbstractClient implements ProductClientInterface
{
    /**
     * {@inheritDoc}
     */
    public function getList(): array
    {
        $response = $this->sendRequest('/products');
        return ProductDTO::arrayFromResponse($response->json());
    }
}
 