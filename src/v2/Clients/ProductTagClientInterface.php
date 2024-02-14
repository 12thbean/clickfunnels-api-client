<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductTags\CreateTagDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductTags\ProductTagDTO;

interface ProductTagClientInterface
{
    /**
     * @param CreateTagDTO $payload
     * @return ProductTagDTO
     */
    public function create(CreateTagDTO $payload): ProductTagDTO;
}
