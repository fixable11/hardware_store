<?php

declare(strict_types=1);

namespace App\Model\Product\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;

/**
 * Class Product.
 *
 * @ORM\Entity
 * @ORM\Table(name="product_details")
 */
class ProductDetail
{
    /**
     * @var Product $product Product entity.
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productDetail")
     * @ORM\JoinColumn(name="product_sku", referencedColumnName="sku")
     */
    private $product;

    /**
     * @var string $version Product version.
     *
     * @ORM\Id
     * @ORM\Column(type="string", name="version", length=20)
     */
    private $version;

    /**
     * @var string $material Material.
     *
     * @ORM\Id
     * @ORM\Column(type="string", name="material")
     */
    private $material;

    /**
     * @var integer $quantity Quantity.
     *
     * @ORM\Column(type="integer", name="quantity", options={"unsigned"=true})
     */
    private $quantity;

    /**
     * @var string $price Price.
     *
     * @ORM\Column(type="string", name="price")
     */
    private $price;

    /**
     * @var $color Product color.
     *
     * @ORM\Id
     * @ORM\Column(type="string", name="color")
     */
    private $color;

    /**
     * @var string $specification Specification.
     *
     * @ORM\Column(type="text", name="specification")
     */
    private $specification;

    /**
     * ProductDetail constructor.
     *
     * @param Product $product       Product entity.
     * @param string  $version       Product version.
     * @param integer $quantity      Quantity.
     * @param string  $color         Color.
     * @param string  $specification Specification.
     * @param string  $price         Price.
     * @param string  $material      Material.
     */
    public function __construct(
        Product $product,
        string $version,
        int $quantity,
        string $color,
        string $specification,
        string $price,
        string $material
    ) {
        $this->product = $product;
        $this->version = $version;
        $this->quantity = $quantity;
        $this->color = $color;
        $this->specification = $specification;
        $this->price = $price;
        $this->material = $material;
    }
}
