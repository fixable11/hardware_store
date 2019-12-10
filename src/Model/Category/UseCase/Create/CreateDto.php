<?php

declare(strict_types=1);

namespace App\Model\Category\UseCase\Create;

use App\Model\Category\Entity\Category;
use Symfony\Component\Validator\Constraints as Assert;

class CreateDto
{
    /**
     * @var string $name Category name.
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Type("string")
     */
    public $name;

    /**
     * @var string $parentId Category parent id.
     * @Assert\Type("integer")
     */
    public $parentId;
}