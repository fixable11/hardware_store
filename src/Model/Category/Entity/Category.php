<?php

declare(strict_types=1);

namespace App\Model\Category\Entity;

use App\Model\ValueObjects\Id;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DomainException;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Model\Product\Entity\Product;
use Symfony\Component\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;

/**
 * Class Category.
 *
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class Category
{
    /**
     * @var Id $id Entity id.
     *
     * @SWG\Property(type="integer", example="1", description="Id")
     *
     * @Groups("category")
     *
     * @ORM\Column(type="id", name="id")
     * @ORM\GeneratedValue()
     * @ORM\Id
     */
    private $id;

    /**
     * Parent category.
     *
     * @var Category|null $parent Parent category.
     *
     * @Groups("category")
     *
     * @ORM\ManyToOne(targetEntity="Category", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $parent;

    /**
     * @var string $name Category name.
     *
     * @Groups("category")
     *
     * @SWG\Property(type="string", example="Category name", description="Category name")
     *
     * @ORM\Column(type="string", name="name", nullable=false)
     */
    private $name;

    /**
     * @var ArrayCollection $products Products.
     *
     * One category has a many products.
     *
     * @ORM\OneToMany(targetEntity="App\Model\Product\Entity\Product", mappedBy="category")
     */
    private $products;

    /**
     * Category constructor.
     *
     * @param string        $name   Category name.
     * @param Category|null $parent Parent category.
     */
    public function __construct(string $name, Category $parent = null)
    {
        $this->name = $name;
        $this->parent = $parent;
        $this->products = new ArrayCollection();
    }

    /**
     * Edit category.
     *
     * @param null|Category $parent Parent category.
     * @param string        $name   Category name.
     *
     * @return void
     *
     * @throws DomainException DomainException.
     */
    public function edit(?Category $parent, string $name): void
    {
        if ($parent !== null && $parent->getId() === $this->getId()) {
            throw new DomainException('You cannot pass the same category');
        }
        if ($parent !== null) {
            $this->parent = $parent;
        }
        $this->name = $name;
    }

    /**
     * Make category parent one.
     *
     * @return void
     */
    public function makeParent(): void
    {
        $this->parent = null;
    }

    /**
     * Get id.
     *
     * @return null|Id
     */
    public function getId(): ?Id
    {
        return $this->id;
    }

    /**
     * Get category name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get parent category.
     *
     * @return null|Category
     */
    public function getParent(): ?Category
    {
        return $this->parent;
    }

    /**
     * Get products.
     *
     * @return ArrayCollection
     */
    public function getProducts(): ArrayCollection
    {
        return $this->products;
    }
}
