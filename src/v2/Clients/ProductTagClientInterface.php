<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\TagDTO;

interface ProductTagClientInterface
{
    /**
     * @param TagDTO $payload
     * @return TagDTO
     */
    public function create(TagDTO $payload): TagDTO;
}
