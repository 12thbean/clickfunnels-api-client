<?php

namespace Zendrop\ClickFunnelsApiClient\Clients;

use Zendrop\ClickFunnelsApiClient\DTO\Products\ProductDTO;

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
