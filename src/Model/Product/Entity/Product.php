<?php

declare(strict_types=1);

namespace App\Model\Product\Entity;

use App\Model\Category\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;

/**
 * Class Product.
 *
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
    /**
     * @var Sku $sku Entity id.
     *
     * @SWG\Property(type="string", example="002d6fbc-16ae-11ea-8d71-362b9e155667", description="Sku")
     *
     * @Groups("product")
     *
     * @ORM\Column(type="product_sku")
     * @ORM\Id
     */
    private $sku;

    /**
     * @var string $name Product name.
     *
     * @SWG\Property(type="string", example="Product name", description="Product name")
     *
     * @Groups("product")
     *
     * @ORM\Column(type="string", name="name", nullable=false)
     */
    private $name;

    /**
     * @var string $description Description.
     *
     * @SWG\Property(type="string", example="Product description", description="Product description")
     *
     * @Groups("product")
     *
     * @ORM\Column(type="text", name="password_hash", nullable=false)
     */
    private $description;

    /**
     * Many products belongs to one brand.
     *
     * @var Brand $brand Product brand.
     *
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="product")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     */
    private $brand;

    /**
     * @var array $photos Photos.
     *
     * @SWG\Property(type="string[]", example="['img1.png', 'img2.jpg']", description="Photos")
     *
     * @Groups("product")
     *
     * @ORM\Column(type="json", name="photos")
     */
    private $photos;

    /**
     * @var Collection $productDetail ProductDetail.
     *
     * @ORM\OneToMany(targetEntity="ProductDetail", mappedBy="product", cascade={"persist", "remove"},
     *     orphanRemoval=true)
     */
    private $productDetail;

    /**
     * @var Status $status Product status.
     *
     * @ORM\Column(type="product_status", name="status")
     *
     * @SWG\Property(type="string", example="active_status", description="Product status", enum={
        "active_status", "inactive_status"
     })
     *
     * @Groups("product")
     */
    private $status;

    /**
     * Many products belongs to one category
     *
     * @var Category|null $category Product category.
     *
     * @ORM\ManyToOne(targetEntity="App\Model\Category\Entity\Category", inversedBy="products", cascade={"remove"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $category;

    /**
     * Product constructor.
     *
     * @param Sku    $sku         Product sku.
     * @param string $name        Name.
     * @param string $description Description.
     */
    public function __construct(
        Sku $sku,
        string $name,
        string $description
    ) {
        $this->sku = $sku;
        $this->name = $name;
        $this->description = $description;
        $this->photos = [];
        $this->status = new Status(Status::STATUS_ACTIVE);
        $this->productDetail = new ArrayCollection();
        $this->category = null;
    }

    /**
     * Add product detail.
     *
     * @param string  $version       Version.
     * @param integer $quantity      Quantity.
     * @param string  $color         Color.
     * @param string  $specification Specification.
     * @param string  $price         Price.
     * @param string  $material      Material.
     *
     * @return void
     */
    public function addProductDetail(
        string $version,
        int $quantity,
        string $color,
        string $specification,
        string $price,
        string $material
    ) {
        $productDetail = new ProductDetail(
            $this,
            $version,
            $quantity,
            $color,
            $specification,
            $price,
            $material
        );

        $this->productDetail->add($productDetail);
    }

    /**
     * Attach brand to product.
     *
     * @param Brand $brand Brand.
     *
     * @return void
     */
    public function attachBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * Edit user.
     *
     * @param string $name        Product name.
     * @param string $description Product description.
     * @param Status $status      Product status.
     *
     * @return void
     */
    public function edit(string $name, string $description, Status $status): void
    {
        //$this->sku = $sku;
        $this->name = $name;
        $this->description = $description;
        $this->status = $status;
    }

    /**
     * Get product sku.
     *
     * @return Sku
     */
    public function getSku(): Sku
    {
        return $this->sku;
    }

    /**
     * Add photo.
     *
     * @param array $photos Array of photos.
     *
     * @return void
     */
    public function addPhotos(array $photos): void
    {
        $this->photos = $photos;
    }

    /**
     * Get photos.
     *
     * @return array
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * Assign category to product.
     *
     * @param Category $category Product category.
     *
     * @return void
     */
    public function assignCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @return Collection
     */
    public function getProductDetail(): Collection
    {
        return $this->productDetail;
    }
}
