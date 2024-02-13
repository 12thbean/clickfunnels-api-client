<?php

namespace Zendrop\ClickFunnelsApiClient\Clients;

use Zendrop\ClickFunnelsApiClient\DTO\Products\ProductDTO;

interface ProductClientInterface
{
    /**
     * Returns a list of products
     *
     * @return ProductDTO[]
     */
    public function getList(): array;
}
