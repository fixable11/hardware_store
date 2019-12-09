<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Product\Service;

use App\Model\Product\Repository\ProductRepository;
use App\Model\Product\Service\DeleteService;
use App\Model\Product\Service\UpdateService;
use App\Model\Product\UseCase\Update\UpdateDto;
use App\Tests\Builder\ProductBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class UpdateServiceTest.
 */
class UpdateServiceTest extends TestCase
{
    /**
     * @var MockObject $productRepository Product repository.
     */
    private $productRepository;

    /**
     * @var UpdateService $updateService Update Service.
     */
    private $updateService;

    /**
     * Set up fixtures.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->productRepository = $this->createMock(ProductRepository::class);
        $this->updateService = new UpdateService($this->productRepository);
    }

    public function testSuccessfullyDeleted()
    {
        $product = (new ProductBuilder)->build();
        $updateDto = UpdateDto::fromProduct($product);

        $this->productRepository->method('get')->willReturn($product);

        $this->productRepository->expects($this->once())
            ->method('flush');

        self::assertEquals($product, $this->updateService->update($updateDto));
    }
}