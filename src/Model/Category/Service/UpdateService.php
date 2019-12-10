<?php

declare(strict_types=1);

namespace App\Model\Category\Service;


use App\Model\Category\Entity\Category;
use App\Model\Category\Repository\CategoryRepository;
use App\Model\Category\UseCase\Update\UpdateDto;
use App\Model\ValueObjects\Id;

/**
 * Class UpdateService
 *
 * @package App\Model\Category\Service
 */
class UpdateService
{
    /**
     * @var CategoryRepository $categoryRepository Category repo.
     */
    private $categoryRepository;

    /**
     * UpdateService constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Update product.
     *
     * @param UpdateDto $dto Update dto.
     *
     * @return Category
     */
    public function update(UpdateDto $dto): Category
    {
        $category = $this->categoryRepository->get(new Id((int) $dto->id));

        if ($dto->parentId !== null) {
            $parent = $this->categoryRepository->get(new Id((int) $dto->parentId));
        }

        $category->edit(
            $parent ?? null,
            $dto->name,
        );

        $this->categoryRepository->flush();

        return $category;
    }
}