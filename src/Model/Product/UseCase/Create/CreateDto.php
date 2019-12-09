<?php

declare(strict_types=1);

namespace App\Model\Product\UseCase\Create;

use App\Model\Product\Entity\Product;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CreateDto.
 */
class CreateDto
{
    /**
     * @var string $sku Sku.
     * @Assert\Length(max = 36)
     * @Assert\Type("string")
     */
    public $sku;

    /**
     * @var string $name Product name.
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Type("string")
     */
    public $name;

    /**
     * @var string $description Product desc.
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Type("string")
     */
    public $description;

    /**
     * Create dto from product.
     *
     * @param Product $product Product entity.
     *
     * @return CreateDto
     */
    public static function fromProduct(Product $product)
    {
        $dto = new self();
        $dto->name = $product->getName();
        $dto->sku =  $product->getSku()->getValue();
        $dto->description = $product->getDescription();

        return $dto;
    }
}
