<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage\CreateImageDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage\ProductImageDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductImage\UpdateImageDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

interface ProductImageClientInterface
{
    /**
     * Returns a list of product images(paginated).
     *
     * @param ?RequestContextDTO $context
     * @param ?int $after
     *
     * @return iterable<ProductImageDTO>
     * @link https://developers.myclickfunnels.com/reference/listimages
     */
    public function getList(?RequestContextDTO $context = null, ?int $after = null): iterable;

    /**
     * Returns an images by its id.
     *
     * @param int $id
     *
     * @return ProductImageDTO
     * @throws \Zendrop\ClickFunnelsApiClient\Exceptions\ClientException
     * @link https://developers.myclickfunnels.com/reference/getimages
     */
    public function getById(int $id): ProductImageDTO;

    /**
     * Creates new image.
     *
     * @param CreateImageDTO $payload
     *
     * @return ProductImageDTO
     * @link https://developers.myclickfunnels.com/reference/createimages
     */
    public function create(CreateImageDTO $payload): ProductImageDTO;

    /**
     * Updates an image by its id.
     *
     * @param int $id
     * @param UpdateImageDTO $payload
     *
     * @return ProductImageDTO
     * @throws \Zendrop\ClickFunnelsApiClient\Exceptions\ClientException
     * @link https://developers.myclickfunnels.com/reference/updateimages
     */
    public function update(int $id, UpdateImageDTO $payload): ProductImageDTO;

    /**
     * Deletes an image by its id.
     *
     * @param string $id
     *
     * @return bool
     * @link https://developers.myclickfunnels.com/reference/removeimages
     */
    public function delete(string $id): bool;
}
