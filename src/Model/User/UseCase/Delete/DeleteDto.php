<?php

declare(strict_types=1);

namespace App\Model\User\UseCase\Delete;

class DeleteDto
{
    /**
     * @Assert\NotBlank()
     */
    public $id;

    /**
     * DeleteDto constructor.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
}