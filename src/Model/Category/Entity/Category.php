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
     * @ORM\Column(type="id", name="id")
     * @ORM\GeneratedValue()
     * @ORM\Id
     */
    private $id;

    /**
     * Parent category.
     *
     * @ORM\OneToOne(targetEntity="Category", cascade={"remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $parent;

    /**
     * @var string $name Category name.
     *
     * @ORM\Column(type="string", name="name", nullable=false)
     */
    private $name;

    /**
     * One category has a many products.
     *
     * @ORM\OneToMany(targetEntity="App\Model\Product\Entity\Product", mappedBy="category")
     */
    private $products;

    /**
     * Category constructor.
     *
     * @param string        $name
     * @param Category|null $parent
     */
    public function __construct(string $name, Category $parent = null)
    {
        $this->name = $name;
        $this->parent = $parent;
        $this->products = new ArrayCollection();
    }

    /**
     * @param null|Category $parent
     * @param string        $name
     */
    public function edit(?Category $parent, string $name)
    {
        if ($parent->getId() === $this->getId()) {
            throw new DomainException('You cannot pass the same category');
        }
        if ($parent !== null) {
            $this->parent = $parent;
        }
        $this->name = $name;
    }

    public function makeParent()
    {
        $this->parent = null;
    }

    /**
     * @return null|Id
     */
    public function getId(): ?Id
    {
        return $this->id;
    }

    /**
     * @return null|Category
     */
    public function getParent(): ?Category
    {
        return $this->parent;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts(): ArrayCollection
    {
        return $this->products;
    }
}