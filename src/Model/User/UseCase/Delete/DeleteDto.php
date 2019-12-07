<?php

declare(strict_types=1);

namespace App\Model\User\UseCase\Delete;

/**
 * Class DeleteDto.
 */
class DeleteDto
{
    /**
     * @var string $id Id.
     * @Assert\NotBlank()
     */
    public $id;

    /**
     * DeleteDto constructor.
     *
     * @param string $id Id.
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
