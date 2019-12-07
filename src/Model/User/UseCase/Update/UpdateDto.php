<?php

declare(strict_types=1);

namespace App\Model\User\UseCase\Update;

use App\Model\User\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

class UpdateDto
{
    /**
     * @Assert\NotBlank()
     */
    public $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Type("string")
     */
    public $firstName;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Type("string")
     */
    public $lastName;


    /**
     * UpdateDto constructor.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function fromUser(User $user): self
    {
        $dto = new self($user->getId()->getValue());
        $dto->email = $user->getEmail() ? $user->getEmail()->getValue() : null;
        $dto->firstName = $user->getName()->getFirst();
        $dto->lastName = $user->getName()->getLast();

        return $dto;
    }
}