<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Product\Service;

use App\Model\Product\Repository\ProductRepository;
use App\Model\Product\Service\DeleteService;
use App\Tests\Builder\ProductBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class DeleteServiceTest.
 */
class DeleteServiceTest extends TestCase
{
    /**
     * @var MockObject $productRepository Product repository.
     */
    private $productRepository;

    /**
     * @var DeleteService $deleteService Delete Service.
     */
    private $deleteService;

    /**
     * Set up fixtures.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->productRepository = $this->createMock(ProductRepository::class);
        $this->deleteService = new DeleteService($this->productRepository);
    }

    public function testSuccessfullyDeleted()
    {
        $product = (new ProductBuilder)->build();

        $this->productRepository->method('get')->willReturn($product);

        $this->productRepository->expects($this->once())
            ->method('delete')
            ->with($this->equalTo($product));

        $this->productRepository->expects($this->once())
            ->method('flush');

        $this->deleteService->delete($product->getSku()->getValue());
    }
}