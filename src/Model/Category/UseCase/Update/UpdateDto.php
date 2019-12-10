<?php

declare(strict_types=1);

namespace App\Model\Category\UseCase\Update;

use Symfony\Component\Validator\Constraints as Assert;

class UpdateDto
{
    /**
     * @var integer $id Id.
     * @Assert\NotBlank()
     */
    public $id;

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

    /**
     * UpdateDto constructor.
     *
     * @param integer $id Id.
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }
}