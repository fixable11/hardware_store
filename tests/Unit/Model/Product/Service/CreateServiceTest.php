<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Product\Service;

use App\Model\Product\Entity\Product;
use App\Model\Product\Repository\ProductRepository;
use App\Model\Product\Service\CreateService;
use App\Model\Product\UseCase\Create\CreateDto;
use App\Tests\Builder\ProductBuilder;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductServiceTest.
 */
class CreateServiceTest extends TestCase
{
    /**
     * @var MockObject $productRepository
     */
    private $productRepository;

    /**
     * @var CreateService $createService
     */
    private $createService;

    /**
     * Set up fixtures.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->productRepository = $this->createMock(ProductRepository::class);
        $this->createService = new CreateService($this->productRepository);
    }

    /**
     * @throws Exception
     */
    public function testSuccessfullyCreation()
    {
        $product = (new ProductBuilder)->build();
        $createDto = CreateDto::fromProduct($product);

        $this->productRepository->expects($this->once())
            ->method('add')
            ->with($this->equalTo($product));

        $this->productRepository->expects($this->once())
            ->method('flush');

        self::assertEquals($product, $this->createService->create($createDto));
    }
}