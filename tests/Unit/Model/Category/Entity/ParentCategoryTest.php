<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Category\Entity;

use App\Tests\Builder\CategoryBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class CategoryTest.
 */
class ParentCategoryTest extends TestCase
{
    public function testSetParentCategorySuccessfully()
    {
        $childCategory = (new CategoryBuilder(1))->build();
        $parentCategory = (new CategoryBuilder(2))->build();

        $childCategory->edit($parentCategory, 'Category name');

        self::assertSame($parentCategory, $childCategory->getParent());
    }

    public function testSetParentCategoryUnsuccessfully()
    {
        $category = (new CategoryBuilder(1))->build();

        $this->expectExceptionMessage('You cannot pass the same category');

        $category->edit($category, 'Category name');
    }

    public function testMakeCategoryParentOne()
    {
        $childCategory = (new CategoryBuilder(1))->build();
        $parentCategory = (new CategoryBuilder(2))->build();

        $childCategory->edit($parentCategory, 'Category name');
        $childCategory->makeParent();

        self::assertNull($childCategory->getParent());
    }
}