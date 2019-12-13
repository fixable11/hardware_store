<?php

declare(strict_types=1);

namespace App\Model\Product\Service;

use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use App\Model\Product\Filter\GetFilter;
use App\Model\Product\Repository\ProductRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;

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
     * @param GetFilter $filter
     *
     * @return PaginationInterface
     */
    public function getAll(GetFilter $filter)
    {
        return $this->productRepository->getAll($filter);
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
