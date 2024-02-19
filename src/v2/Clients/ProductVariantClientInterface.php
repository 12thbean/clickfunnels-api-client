<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Clients;

use Zendrop\ClickFunnelsApiClient\v2\DTO\Product\ProductVariantDTO;

interface ProductVariantClientInterface
{
    /**
     * Returns a list of product variants.
     *
     * @param int $productId
     *
     * @return ProductVariantDTO[]
     * @link https://apidocs.myclickfunnels.com/tag/Products::Variant#operation/listProductsVariants
     */
    public function getList(int $productId): array;

    /**
     * Returns a product variant by its ID.
     *
     * @param int $id
     * @link https://apidocs.myclickfunnels.com/tag/Products::Variant#operation/getProductsVariants
     */
    public function getById(int $id): ProductVariantDTO;

    /**
     * Creates new product variant.
     *
     * @param int $productId
     * @param ProductVariantDTO $payload
     *
     * @return ProductVariantDTO
     * @link https://apidocs.myclickfunnels.com/tag/Products::Variant#operation/createProductsVariants
     */
    public function create(int $productId, ProductVariantDTO $payload): ProductVariantDTO;

    /**
     * Updates product variant by its ID.
     *
     * @param int $id
     * @param ProductVariantDTO $payload
     *
     * @return ProductVariantDTO
     * @link https://apidocs.myclickfunnels.com/tag/Products::Variant#operation/updateProductsVariants
     */
    public function update(int $id, ProductVariantDTO $payload): ProductVariantDTO;
}
