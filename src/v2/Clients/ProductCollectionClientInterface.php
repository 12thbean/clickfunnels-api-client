<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection\CreateProductCollectionDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection\ProductCollectionDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\ProductCollection\UpdateProductCollectionDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

interface ProductCollectionClientInterface
{
    /**
     * Returns a list of collections(paginated).
     *
     * @param ?RequestContextDTO $context
     * @param ?int $after
     *
     * @return iterable<ProductCollectionDTO>
     * @link https://developers.myclickfunnels.com/reference/listproductscollections
     */
    public function getList(?RequestContextDTO $context = null, ?int $after = null): iterable;

    /**
     * Creates new product collection.
     *
     * @param CreateProductCollectionDTO $payload
     *
     * @return ProductCollectionDTO
     * @link https://developers.myclickfunnels.com/reference/createproductscollections
     */
    public function create(CreateProductCollectionDTO $payload): ProductCollectionDTO;

    /**
     * Returns product collection by id.
     *
     * @param int $id
     *
     * @return ProductCollectionDTO
     * @link https://developers.myclickfunnels.com/reference/getproductscollections
     */
    public function getById(int $id): ProductCollectionDTO;

    /**
     * Updates product collection by id.
     *
     * @param int $id
     * @param UpdateProductCollectionDTO $payload
     *
     * @return ProductCollectionDTO
     * @link https://developers.myclickfunnels.com/reference/updateproductscollections
     */
    public function update(int $id, UpdateProductCollectionDTO $payload): ProductCollectionDTO;
}
