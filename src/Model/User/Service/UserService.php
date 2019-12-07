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
use App\Model\User\UseCase\Delete\DeleteDto;
use App\Model\User\UseCase\Update\UpdateDto;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use DomainException;

/**
 * Class UserService.
 */
class UserService
{
    /**
     * @var UserRepository $repository User repository.
     */
    private $repository;

    /**
     * @var Flusher $flusher Flusher.
     */
    private $flusher;

    /**
     * @var PasswordHasher $hasher Hasher.
     */
    private $hasher;

    /**
     * @var PasswordGenerator $generator Password generator.
     */
    private $generator;

    /**
     * UserService constructor.
     *
     * @param UserRepository    $repository User repository.
     * @param Flusher           $flusher    Flusher.
     * @param PasswordHasher    $hasher     Hasher.
     * @param PasswordGenerator $generator  Password generator.
     */
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

    /**
     * Create user action.
     * phpcs:disable
     *
     * @param CreateDto $dto CreateDto.
     *
     * @return User
     *
     * @throws NoResultException NoResultException.
     * @throws NonUniqueResultException NonUniqueResultException.
     * @throws DomainException DomainException.
     */
    public function create(CreateDto $dto): User
    {
        $email = new Email($dto->email);

        if ($this->repository->hasByEmail($email)) {
            throw new DomainException('User with this email already exists.');
        }

        $user = User::create(
            Id::next(),
            new \DateTimeImmutable(),
            new Name('First name', 'Last name'),
            $email,
            $this->hasher->hash($dto->password)
        );

        $this->repository->add($user);
        $this->flusher->flush();

        return $user;
        // phpcs:enable
    }

    /**
     * Update user action.
     *
     * @param UpdateDto $dto UpdateDto.
     *
     * @return void
     */
    public function update(UpdateDto $dto): void
    {
        $user = $this->repository->get(new Id($dto->id));

        $user->edit(new Email($dto->email), new Name($dto->firstName, $dto->lastName));

        $this->flusher->flush();
    }

    /**
     * Delete user action.
     *
     * @param DeleteDto $dto DeleteDto.
     *
     * @return void
     */
    public function delete(DeleteDto $dto): void
    {
        $this->repository->delete(new Id($dto->id));

        $this->flusher->flush();
    }

    /**
     * Get all users.
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->repository->getAll();
    }
}
