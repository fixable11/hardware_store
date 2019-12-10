<?php

declare(strict_types=1);

namespace App\Tests\Builder;


use App\Model\Category\Entity\Category;
use App\Model\ValueObjects\Id;
use ReflectionObject;

class CategoryBuilder
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var int
     */
    private $id;

    /**
     * @var Category
     */
    private $parentCategory;


    /**
     * CategoryBuilder constructor.
     *
     * @param integer       $id
     * @param string        $name
     * @param Category|null $parentCategory
     */
    public function __construct(int $id, string $name = 'Category name', Category $parentCategory = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->parentCategory = $parentCategory;
    }

    public function build(): Category
    {
        $category = new Category(
            $this->name,
            $this->parentCategory
        );

        $reflection = new ReflectionObject($category);
        $property = $reflection->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($category, new Id($this->id));

        return $category;
    }
}