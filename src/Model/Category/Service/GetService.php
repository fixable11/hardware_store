<?php

declare(strict_types=1);

namespace App\Model\Category\Service;

use App\Model\Category\Entity\Category;
use App\Model\Category\Repository\CategoryRepository;
use App\Model\ValueObjects\Id;

class GetService
{
    /**
     * @var CategoryRepository $categoryRepository Category repository.
     */
    private $categoryRepository;

    /**
     * ProductService constructor.
     *
     * @param CategoryRepository $categoryRepository Category repo.
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all categories.
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->categoryRepository->getAll();
    }

    /**
     * Get product by sku.
     *
     * @param integer $id Id.
     *
     * @return Category
     */
    public function getById(int $id): Category
    {
        return $this->categoryRepository->get(new Id($id));
    }
}