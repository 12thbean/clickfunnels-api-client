<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Products\ProductDTO;

interface ProductClientInterface
{
    /**
     * Returns a list of products
     *
     * @return ProductDTO[]
     */
    public function getList(): array;
}
