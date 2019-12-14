<?php

declare(strict_types=1);

namespace App\Model\Product\Service;

use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use App\Model\Product\Entity\Status;
use App\Model\Product\Repository\ProductRepository;
use App\Model\Product\UseCase\Update\UpdateDto;

/**
 * Class UpdateService.
 */
class UpdateService
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
     * Update product.
     *
     * @param UpdateDto $dto Update dto.
     *
     * @return Product
     */
    public function update(UpdateDto $dto): Product
    {
        $product = $this->productRepository->get(new Sku($dto->sku));
        $product->edit(
            $dto->name,
            $dto->description,
            new Status($dto->status),
            $dto->photos
        );

        $this->productRepository->flush();

        return $product;
    }
}
