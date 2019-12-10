<?php

declare(strict_types=1);

namespace App\Tests\Builder;

use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Sku;

class ProductBuilder
{
    /**
     * @var Sku $sku
     */
    private $sku;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $desc
     */
    private $desc;

    public function __construct(string $name = 'Product Name', string $desc = 'Description')
    {
        $this->sku = Sku::next();
        $this->name = $name;
        $this->desc = $desc;
    }

    public function build(): Product
    {
        $product = new Product(
            $this->sku,
            $this->name,
            $this->desc
        );

        $product->addProductDetail(
            '',
            0,
            '',
            '',
            '',
            ''
        );

        return $product;
    }
}