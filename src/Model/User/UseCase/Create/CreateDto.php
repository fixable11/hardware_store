<?php

declare(strict_types=1);

namespace App\Model\User\UseCase\Create;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CreateDto.
 */
class CreateDto
{
    /**
     * @var string $email Email.
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @var string $password Email.
     * @Assert\NotBlank()
     * @Assert\Length(min = 6)
     */
    public $password;
}
