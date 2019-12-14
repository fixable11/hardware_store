<?php

declare(strict_types=1);

namespace App\Model\Product\UseCase\Update;

use App\Model\Product\Entity\Product;
use App\Model\Product\Entity\Status;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UpdateDto.
 */
class UpdateDto
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
     * @var string $status Status.
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Choice({Status::STATUS_ACTIVE, Status::STATUS_INACTIVE})
     */
    public $status;

    /**
     * @var array $photos Photos.
     *
     * @Assert\All({
     *     @Assert\Image,
     *     @Assert\NotBlank()
     * })
     */
    public $photos = [];

    /**
     * UpdateDto constructor.
     *
     * @param string $sku Product sku.
     */
    public function __construct(string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * Create dto from product.
     *
     * @param Product $product Product.
     *
     * @return UpdateDto
     */
    public static function fromProduct(Product $product)
    {
        $dto = new self($product->getSku()->getValue());
        $dto->name = $product->getName();
        $dto->sku =  $product->getSku()->getValue();
        $dto->description = $product->getDescription();
        $dto->status = $product->getStatus()->getValue();
        $dto->photos = $product->getPhotos();

        return $dto;
    }
}
