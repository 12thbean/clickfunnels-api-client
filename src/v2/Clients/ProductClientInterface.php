<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\CreateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\UpdateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\Pagination\RequestContextDTO;

interface ProductClientInterface
{
    /**
     * Returns a list of products(paginated).
     *
     * @param ?RequestContextDTO $context
     * @param ?int $after
     *
     * @return iterable<ProductDTO>
     * @link https://developers.myclickfunnels.com/reference/listproducts
     */
    public function getList(?RequestContextDTO $context = null, ?int $after = null): iterable;

    /**
     * Returns a product by id.
     *
     * @param int $id
     * @return ProductDTO
     * @link https://developers.myclickfunnels.com/reference/getproducts
     */
    public function getById(int $id): ProductDTO;

    /**
     * Creates a new product.
     *
     * @param CreateProductDTO $payload
     *
     * @return ProductDTO
     * @link https://developers.myclickfunnels.com/reference/createproducts
     */
    public function create(CreateProductDTO $payload): ProductDTO;

    /**
     * Updates a product.
     *
     * @param int $id
     * @param UpdateProductDTO $payload
     *
     * @return ProductDTO
     * @link https://developers.myclickfunnels.com/reference/updateproducts
     */
    public function update(int $id, UpdateProductDTO $payload): ProductDTO;

    /**
     * Archives a product.
     *
     * @param int $id
     * @return ProductDTO
     */
    public function archive(int $id): ProductDTO;

    /**
     * UnArchives a product.
     *
     * @param int $id
     * @return ProductDTO
     */
    public function unArchive(int $id): ProductDTO;
}
