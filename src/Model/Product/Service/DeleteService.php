<?php

declare(strict_types=1);

namespace App\Model\Product\Service;

use App\Model\Product\Entity\Sku;
use App\Model\Product\Repository\ProductRepository;
use Symfony\Component\Filesystem\Filesystem;

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
     * @var Filesystem
     */
    private $filesystem;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository Product repo.
     * @param Filesystem        $filesystem
     */
    public function __construct(ProductRepository $productRepository, Filesystem $filesystem)
    {
        $this->productRepository = $productRepository;
        $this->filesystem = $filesystem;
    }

    /**
     * Delete product by sku.
     *
     * @param string $sku Sku.
     * @param string $targetDirectory
     *
     * @return void
     */
    public function delete(string $sku, string $targetDirectory): void
    {
        $product = $this->productRepository->get(new Sku($sku));
        $photos = $product->getPhotos();
        foreach ($photos as $photo) {
            $this->filesystem->remove($targetDirectory . DIRECTORY_SEPARATOR .  $photo);
        }

        $this->productRepository->delete($product);
        $this->productRepository->flush();
    }
}
