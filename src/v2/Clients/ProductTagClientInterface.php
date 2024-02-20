<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\TagDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\CreateTagDTO;

interface ProductTagClientInterface
{
    /**
     * @param CreateTagDTO $payload
     * @return TagDTO
     */
    public function create(CreateTagDTO $payload): TagDTO;
}
