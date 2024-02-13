<?php

namespace Zendrop\ClickFunnelsApiClient\Clients;

use Zendrop\ClickFunnelsApiClient\DTO\ProductTags\CreateTagDTO;
use Zendrop\ClickFunnelsApiClient\DTO\ProductTags\ProductTagDTO;

interface ProductTagClientInterface
{
    /**
     * @param CreateTagDTO $payload
     * @return ProductTagDTO
     */
    public function create(CreateTagDTO $payload): ProductTagDTO;
}
