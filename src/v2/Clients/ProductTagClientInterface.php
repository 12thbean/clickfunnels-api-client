<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Exceptions\ClientException;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\TagDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\CreateTagDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Tag\UpdateTagDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

interface ProductTagClientInterface
{
    /**
     * Returns a paginated list of products tags.
     *
     * @param ?RequestContextDTO $context
     * @param ?int $after
     *
     * @return iterable<TagDTO>
     * @link https://developers.myclickfunnels.com/reference/listproductstags
     */
    public function getList(?RequestContextDTO $context = null, ?int $after = null): iterable;

    /**
     * Returns product tag by id.
     *
     * @param int $id
     *
     * @return TagDTO
     * @throws ClientException
     *
     * @link https://developers.myclickfunnels.com/reference/getproductstags
     */
    public function getById(int $id): TagDTO;

    /**
     * Creates a new tag.
     *
     * @param CreateTagDTO $payload
     * @return TagDTO
     *
     * @link https://developers.myclickfunnels.com/reference/createproductstags
     */
    public function create(CreateTagDTO $payload): TagDTO;

    /**
     * Updates tag by id.
     *
     * @param int $id
     * @param UpdateTagDTO $payload
     *
     * @return TagDTO
     * @throws ClientException
     *
     * @link https://developers.myclickfunnels.com/reference/updateproductstags
     */
    public function update(int $id, UpdateTagDTO $payload): TagDTO;

    /**
     * Removes tag by id.
     *
     * @param int $id
     *
     * @return bool
     * @throws ClientException
     *
     * @link https://developers.myclickfunnels.com/reference/removeproductstags
     */
    public function delete(int $id): bool;
}
