<?php

declare(strict_types=1);

namespace App\Model\Product\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;

/**
 * Class Brand.
 *
 * @ORM\Entity
 * @ORM\Table(name="brands")
 */
class Brand
{
    /**
     * @var integer $id Id.
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string $name Name.
     *
     * @ORM\Column(type="string", name="name", nullable=false)
     */
    private $name;

    /**
     * @var Product $product Product.
     *
     * @ORM\OneToMany(targetEntity="Product", mappedBy="brand")
     */
    private $product;
}
