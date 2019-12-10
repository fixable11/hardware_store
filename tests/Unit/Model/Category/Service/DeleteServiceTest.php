<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Category\Service;

use App\Model\Category\Repository\CategoryRepository;
use App\Model\Category\Service\DeleteService;
use App\Model\EntityNotFoundException;
use App\Tests\Builder\CategoryBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class DeleteServiceTest.
 */
class DeleteServiceTest extends TestCase
{
    /**
     * @var MockObject $categoryRepository Category repo.
     */
    private $categoryRepository;

    /**
     * @var DeleteService $deleteService Delete service.
     */
    private $deleteService;

    protected function setUp()
    {
        parent::setUp();

        $this->categoryRepository = $this->createMock(CategoryRepository::class);
        $this->deleteService = new DeleteService($this->categoryRepository);
    }

    public function testSuccessfullyDeleted()
    {
        $category = (new CategoryBuilder(1))->build();

        $this->categoryRepository->method('get')->willReturn($category);

        $this->categoryRepository->expects($this->once())
            ->method('delete')
            ->with($this->equalTo($category));

        $this->categoryRepository->expects($this->once())
            ->method('flush');

        $this->deleteService->delete($category->getId()->getValue());
    }

    public function testDeletedFailed()
    {
        $category = (new CategoryBuilder(1))->build();

        $this->categoryRepository->method('get')->willThrowException(new EntityNotFoundException());

        $this->expectException(EntityNotFoundException::class);
        $this->deleteService->delete($category->getId()->getValue());
    }
}