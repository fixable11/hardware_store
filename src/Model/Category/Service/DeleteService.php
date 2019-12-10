<?php

declare(strict_types=1);

namespace App\Model\Category\Service;


use App\Model\Category\Repository\CategoryRepository;
use App\Model\ValueObjects\Id;

class DeleteService
{
    /**
     * @var CategoryRepository $categoryRepository Category repository.
     */
    private $categoryRepository;

    /**
     * DeleteService constructor.
     *
     * @param CategoryRepository $categoryRepository Category repo.
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Delete category by id.
     *
     * @param integer $id Id.
     *
     * @return void
     */
    public function delete(int $id): void
    {
        $category = $this->categoryRepository->get(new Id($id));
        $this->categoryRepository->delete($category);
        $this->categoryRepository->flush();
    }
}