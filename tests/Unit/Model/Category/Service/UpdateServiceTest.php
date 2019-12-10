<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Category\Service;

use App\Model\Category\Entity\Category;
use App\Model\Category\Repository\CategoryRepository;
use App\Model\Category\Service\DeleteService;
use App\Model\Category\Service\UpdateService;
use App\Model\Category\UseCase\Create\CreateDto;
use App\Model\Category\UseCase\Update\UpdateDto;
use App\Model\EntityNotFoundException;
use App\Model\ValueObjects\Id;
use App\Tests\Builder\CategoryBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UpdateServiceTest extends TestCase
{
    /**
     * @var MockObject $categoryRepository Category repo.
     */
    private $categoryRepository;

    /**
     * @var UpdateService $updateService UpdateService.
     */
    private $updateService;

    protected function setUp()
    {
        parent::setUp();

        $this->categoryRepository = $this->createMock(CategoryRepository::class);
        $this->updateService = new UpdateService($this->categoryRepository);
    }

    public function testSuccessfullyUpdated()
    {
        $category = (new CategoryBuilder(1))->build();

        $updateDto = new UpdateDto(1);
        $updateDto->name = 'new name';

        $this->categoryRepository->expects($this->once())
            ->method('get')
            ->willReturn($category);

        $this->categoryRepository->expects($this->once())
            ->method('flush');

        $updated = $this->updateService->update($updateDto);

        self::assertEquals(1, $updated->getId()->getValue());
        self::assertEquals('new name', $updated->getName());
        self::assertEquals(null, $updated->getParent());
    }

    public function testFailedUpdated()
    {
        $category = (new CategoryBuilder(1))->build();

        $updateDto = new UpdateDto(1);
        $updateDto->name = 'new name';

        $this->categoryRepository->expects($this->once())
            ->method('get')
            ->willReturn($category);

        $this->categoryRepository->expects($this->once())
            ->method('flush')
            ->willThrowException(new EntityNotFoundException());

        $this->expectException(EntityNotFoundException::class);

        $this->updateService->update($updateDto);
    }
}