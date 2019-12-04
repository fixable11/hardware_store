<?php

declare(strict_types=1);

namespace App\Model\User\Service;

use App\Model\Flusher;
use App\Model\User\Entity\Email;
use App\Model\User\Entity\Id;
use App\Model\User\Entity\Name;
use App\Model\User\Entity\User;
use App\Model\User\Repository\UserRepository;
use App\Model\User\UseCase\Create\CreateDto;

/**
 * Class UserService.
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var Flusher
     */
    private $flusher;

    /**
     * @var PasswordHasher
     */
    private $hasher;
    /**
     * @var PasswordGenerator
     */
    private $generator;

    public function __construct(
        UserRepository $repository,
        Flusher $flusher,
        PasswordHasher $hasher,
        PasswordGenerator $generator
    ) {
        $this->repository = $repository;
        $this->flusher = $flusher;
        $this->hasher = $hasher;
        $this->generator = $generator;
    }

    public function create(CreateDto $dto)
    {
        $email = new Email($dto->email);

        if ($this->repository->hasByEmail($email)) {
            throw new \DomainException('User with this email already exists.');
        }

        $user = User::create(
            Id::next(),
            new \DateTimeImmutable(),
            new Name(
                $dto->firstName,
                $dto->lastName
            ),
            $email,
            $this->hasher->hash($this->generator->generate())
        );

        $this->repository->add($user);
        $this->flusher->flush();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}