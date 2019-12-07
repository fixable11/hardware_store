<?php

declare(strict_types=1);

namespace App\Model\User\UseCase\Update;

use App\Model\User\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UpdateDto.
 */
class UpdateDto
{
    /**
     * @var string $id Id.
     * @Assert\NotBlank()
     */
    public $id;

    /**
     * @var string $email Email.
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @var string $firstName FirstName.
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Type("string")
     */
    public $firstName;

    /**
     * @var string $lastName LastName.
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     * @Assert\Type("string")
     */
    public $lastName;


    /**
     * UpdateDto constructor.
     *
     * @param string $id Id.
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @param User $user User.
     *
     * @return static
     */
    public static function fromUser(User $user): self
    {
        $dto = new self($user->getId()->getValue());
        $dto->email = $user->getEmail() ? $user->getEmail()->getValue() : null;
        $dto->firstName = $user->getName()->getFirst();
        $dto->lastName = $user->getName()->getLast();

        return $dto;
    }
}
