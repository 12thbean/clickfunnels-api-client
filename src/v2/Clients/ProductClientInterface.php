<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\CreateProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductDTO;
use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\UpdateProductDTO;

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
     * @param CreateProductDTO $payload
     *
     * @return ProductDTO
     * @link https://apidocs.myclickfunnels.com/tag/Product#operation/createProducts
     */
    public function create(CreateProductDTO $payload): ProductDTO;

    /**
     * Updates a product.
     *
     * @param int $id
     * @param UpdateProductDTO $payload
     *
     * @return ProductDTO
     * @link https://apidocs.myclickfunnels.com/tag/Product#operation/updateProducts
     */
    public function update(int $id, UpdateProductDTO $payload): ProductDTO;
}
