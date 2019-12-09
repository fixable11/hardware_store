<?php

declare(strict_types=1);

namespace App\Model\Product\Service;

use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use App\Model\Product\Repository\ProductRepository;

/**
 * Class GetService.
 */
class GetService
{
    /**
     * @var ProductRepository $productRepository Product repository.
     */
    private $productRepository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository Product repo.
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Get all products.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    /**
     * Get product by sku.
     *
     * @param string $sku Product sku.
     *
     * @return Product
     */
    public function getBySku(string $sku): Product
    {
        return $this->productRepository->get(new Sku($sku));
    }
}
