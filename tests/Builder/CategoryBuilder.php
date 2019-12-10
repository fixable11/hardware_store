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
     * @param Category|null $parentCategory
     * @param string        $name
     */
    public function __construct(?int $id, Category $parentCategory = null, string $name = 'Category name')
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

        if ($this->id !== null) {
            $reflection = new ReflectionObject($category);
            $property = $reflection->getProperty('id');
            $property->setAccessible(true);
            $property->setValue($category, new Id($this->id));
        }

        return $category;
    }
}