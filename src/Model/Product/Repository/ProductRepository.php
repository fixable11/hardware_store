<?php

declare(strict_types=1);

namespace App\Model\Product\Repository;

use App\Model\EntityNotFoundException;
use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;
use App\Model\Product\Filter\GetFilter;
use Doctrine\DBAL\FetchMode;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\PaginationInterface as Paginator;

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
     * @var PaginatorInterface $paginator Paginator.
     */
    private $paginator;

    /**
     * UserRepository constructor.
     *
     * @param EntityManagerInterface $em Entity manager.
     * @param PaginatorInterface     $paginator
     */
    public function __construct(EntityManagerInterface $em, PaginatorInterface $paginator)
    {
        $this->em = $em;
        /** @var EntityRepository $repo */
        $repo = $em->getRepository(Product::class);
        $this->repo = $repo;
        $this->paginator = $paginator;
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
     * @param GetFilter $filter Filter.
     *
     * @return Paginator
     */
    public function getAll(GetFilter $filter): Paginator
    {
        $qb = $this->repo->createQueryBuilder('product');

        return $this->paginator->paginate(
            $qb,
            $filter->page,
            $filter->limit
        );
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
