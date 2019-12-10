<?php

declare(strict_types=1);

namespace App\Model\Product\Service;

use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use App\Model\Product\Repository\ProductRepository;
use App\Model\Product\UseCase\Create\CreateDto;
use Exception;

/**
 * Class CreateService.
 */
class CreateService
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
     * Create product action.
     *
     * @param CreateDto $dto Create dto.
     *
     * @return Product
     *
     * @throws Exception Exception.
     */
    public function create(CreateDto $dto): Product
    {
        $product = new Product(
            empty($dto->sku) ? Sku::next() : new Sku($dto->sku),
            $dto->name,
            $dto->description
        );

        $this->addProductDetail($product);

        $this->productRepository->add($product);
        $this->productRepository->flush();

        return $product;
    }

    /**
     * Add details to product.
     *
     * @param Product $product Product entity.
     *
     * @return void
     */
    private function addProductDetail(Product $product): void
    {
        $product->addProductDetail(
            '',
            0,
            '',
            '',
            '',
            ''
        );
    }
}
