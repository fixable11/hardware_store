<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Category\Service;

use App\Model\Category\Repository\CategoryRepository;
use App\Model\Category\Service\CreateService;
use App\Model\Category\UseCase\Create\CreateDto;
use App\Model\EntityNotFoundException;
use App\Model\ValueObjects\Id;
use App\Tests\Builder\CategoryBuilder;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CreateServiceTest extends TestCase
{
    /**
     * @var MockObject $categoryRepository Category repository.
     */
    private $categoryRepository;

    /**
     * @var CreateService $createService Create Service.
     */
    private $createService;

    /**
     * Set up fixtures.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->categoryRepository = $this->createMock(CategoryRepository::class);
        $this->createService = new CreateService($this->categoryRepository);
    }

    /**
     * @throws Exception
     */
    public function testSuccessfullyCreation()
    {
        $category = (new CategoryBuilder(null))->build();

        $createDto = new CreateDto();
        $createDto->name = $category->getName();

        $this->categoryRepository->expects($this->once())
            ->method('add')
            ->with($this->equalTo($category));

        $this->categoryRepository->expects($this->once())
            ->method('flush');

        self::assertEquals($category, $this->createService->create($createDto));
    }

    /**
     * @throws Exception
     */
    public function testFailedCreation()
    {
        $category = (new CategoryBuilder(null))->build();

        $createDto = new CreateDto();
        $createDto->name = $category->getName();

        $this->categoryRepository->expects($this->once())
            ->method('add')
            ->with($this->equalTo($category));

        $this->categoryRepository->expects($this->once())
            ->method('flush')->willThrowException(new EntityNotFoundException());

        $this->expectException(EntityNotFoundException::class);
        $this->createService->create($createDto);
    }

    /**
     * @throws Exception
     */
    public function testSuccessfullyCreationWithParent()
    {
        $parent = (new CategoryBuilder(1))->build();
        $child = (new CategoryBuilder(null, $parent))->build();

        $createDto = new CreateDto();
        $createDto->name = $child->getName();
        $createDto->parentId = 1;

        $this->categoryRepository->expects($this->once())
            ->method('get')
            ->with($this->equalTo(new Id(1)))
            ->willReturn($parent);

        $this->categoryRepository->expects($this->once())
            ->method('add')
            ->with($this->equalTo($child));

        $this->categoryRepository->expects($this->once())
            ->method('flush');

        self::assertEquals($child, $this->createService->create($createDto));
    }

    /**
     * @throws Exception
     */
    public function testRepositoryThrowsExceptionIfEntityNotFound()
    {
        $category = (new CategoryBuilder(null))->build();

        $createDto = new CreateDto();
        $createDto->name = $category->getName();
        $createDto->parentId = 1;

        $this->categoryRepository->expects($this->once())
            ->method('get')
            ->willThrowException(new EntityNotFoundException);

        $this->expectException(EntityNotFoundException::class);
        $this->createService->create($createDto);
    }
}