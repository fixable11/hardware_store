<?php

declare(strict_types=1);

namespace App\Model\Product\Repository;

use App\Model\EntityNotFoundException;
use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class ProductRepository.
 */
class ProductRepository
{
    /**
     * @var EntityManagerInterface $em Entity manager.
     */
    private $em;

    /**
     * @var EntityRepository $repo Repository.
     */
    private $repo;

    /**
     * UserRepository constructor.
     *
     * @param EntityManagerInterface $em Entity manager.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        /** @var EntityRepository $repo */
        $repo = $em->getRepository(Product::class);
        $this->repo = $repo;
    }

    /**
     * Get product by id.
     *
     * @param Sku $sku Sku..
     *
     * @return Product
     *
     * @throws EntityNotFoundException EntityNotFoundException.
     */
    public function get(Sku $sku): Product
    {
        /** @var Product $product */
        if (! $product = $this->repo->find($sku->getValue())) {
            throw new EntityNotFoundException('Product is not found.');
        }
        return $product;
    }

    /**
     * Delete product.
     *
     * @param Product $product Product.
     *
     * @return void
     *
     * @throws EntityNotFoundException EntityNotFoundException.
     */
    public function delete(Product $product): void
    {
        $this->em->remove($product);
    }

    /**
     * Add product.
     *
     * @param Product $product Product.
     *
     * @return void
     */
    public function add(Product $product): void
    {
        $this->em->persist($product);
    }

    /**
     * Get all products.
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->repo->findAll();
    }

    /**
     * Flush.
     *
     * @return void
     */
    public function flush(): void
    {
        $this->em->flush();
    }
}
