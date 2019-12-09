<?php

declare(strict_types=1);

namespace App\Model\Product\Service;

use App\Model\Product\Entity\Sku;
use App\Model\Product\Repository\ProductRepository;

/**
 * Class DeleteService.
 */
class DeleteService
{
    /**
     * @var ProductRepository $productRepository Product repo.
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
     * Delete product by sku.
     *
     * @param string $sku Sku.
     *
     * @return void
     */
    public function delete(string $sku): void
    {
        $product = $this->productRepository->get(new Sku($sku));
        $this->productRepository->delete($product);
        $this->productRepository->flush();
    }
}
