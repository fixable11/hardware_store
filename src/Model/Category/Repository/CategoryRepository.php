<?php

declare(strict_types=1);

namespace App\Model\Category\Repository;

use App\Model\Category\Entity\Category;
use App\Model\EntityNotFoundException;
use App\Model\ValueObjects\Id;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class CategoryRepository
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
        $repo = $em->getRepository(Category::class);
        $this->repo = $repo;
    }

    /**
     * Get product by id.
     *
     * @param Id $id
     *
     * @return Category
     *
     */
    public function get(Id $id): Category
    {
        /** @var Category $category */
        if (! $category = $this->repo->find($id->getValue())) {
            throw new EntityNotFoundException('Category is not found.');
        }
        return $category;
    }

    /**
     * Delete product.
     *
     * @param Category $category
     *
     * @return void
     */
    public function delete(Category $category): void
    {
        $this->em->remove($category);
    }

    /**
     * Add product.
     *
     * @param Category $category Product.
     *
     * @return void
     */
    public function add(Category $category): void
    {
        $this->em->persist($category);
    }

    /**
     * Get all categories.
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