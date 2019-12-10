<?php

declare(strict_types=1);

namespace App\Model\Category\Service;

use App\Model\Category\Entity\Category;
use App\Model\Category\Repository\CategoryRepository;
use App\Model\Category\UseCase\Create\CreateDto;
use App\Model\ValueObjects\Id;
use Exception;

/**
 * Class CreateService.
 */
class CreateService
{
    /**
     * @var CategoryRepository $categoryRepository Category repo.
     */
    private $categoryRepository;

    /**
     * CreateService constructor.
     *
     * @param CategoryRepository $categoryRepository Category repository.
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Create product action.
     *
     * @param CreateDto $dto Create dto.
     *
     * @return Category
     *
     * @throws Exception Exception.
     */
    public function create(CreateDto $dto): Category
    {
        if ($id = $dto->parentId !== null) {
            $parent = $this->categoryRepository->get(new Id((int) $id));
        }

        $category = new Category(
            $dto->name,
            $parent ?? null
        );

        $this->categoryRepository->add($category);
        $this->categoryRepository->flush();

        return $category;
    }
}
