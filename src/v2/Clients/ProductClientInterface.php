<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;

interface ProductClientInterface
{
    /**
     * Returns a list of products.
     *
     * @return ProductDTO[]
     * @link https://apidocs.myclickfunnels.com/tag/Product/#operation/listProducts
     */
    public function getList(): array;

    /**
     * Returns a product by id.
     *
     * @param int $id
     * @return ProductDTO
     * @link https://apidocs.myclickfunnels.com/tag/Product#operation/getProducts
     */
    public function getById(int $id): ProductDTO;

    /**
     * Creates a new product.
     *
     * @param ProductDTO $payload
     *
     * @return ProductDTO
     * @link https://apidocs.myclickfunnels.com/tag/Product#operation/createProducts
     */
    public function create(ProductDTO $payload): ProductDTO;

    /**
     * Updates a product.
     *
     * @param int $id
     * @param ProductDTO $payload
     *
     * @return ProductDTO
     * @link https://apidocs.myclickfunnels.com/tag/Product#operation/updateProducts
     */
    public function update(int $id, ProductDTO $payload): ProductDTO;
}
