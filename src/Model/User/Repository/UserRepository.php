<?php

declare(strict_types=1);

namespace App\Model\User\Repository;

use App\Model\EntityNotFoundException;
use App\Model\User\Entity\Email;
use App\Model\User\Entity\Id;
use App\Model\User\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

/**
 * Class UserRepository.
 */
class UserRepository
{
    /**
     * @var EntityManagerInterface $em Entity manager.
     */
    private $em;

    /**
     * @var EntityRepository $repo Repository.
     */
    private $repo;

    /**
     * UserRepository constructor.
     *
     * @param EntityManagerInterface $em Entity manager.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        /** @var EntityRepository $repo */
        $repo = $em->getRepository(User::class);
        $this->repo =  $repo;
    }

    /**
     * Find user by confirm token.
     *
     * @param string $token Token.
     *
     * @return User|null
     */
    public function findByConfirmToken(string $token): ?User
    {
        /** @var User|null $user */
        $user = $this->repo->findOneBy(['confirmToken' => $token]);

        return $user;
    }

    /**
     * Find user by reset token.
     *
     * @param string $token Token.
     *
     * @return User|null
     */
    public function findByResetToken(string $token): ?User
    {
        /** @var User|null $user */
        $user = $this->repo->findOneBy(['resetToken.token' => $token]);

        return $user;
    }

    /**
     * Get user by id.
     *
     * @param Id $id Id.
     *
     * @return User
     *
     * @throws EntityNotFoundException EntityNotFoundException.
     */
    public function get(Id $id): User
    {
        /** @var User $user */
        if (! $user = $this->repo->find($id->getValue())) {
            throw new EntityNotFoundException('User is not found.');
        }
        return $user;
    }

    /**
     * Delete user.
     *
     * @param Id $id Id.
     *
     * @return void
     *
     * @throws EntityNotFoundException EntityNotFoundException.
     */
    public function delete(Id $id): void
    {
        if (! $user = $this->repo->find($id->getValue())) {
            throw new EntityNotFoundException('User is not found.');
        }

        $this->em->remove($user);
    }

    /**
     * Get user by email.
     *
     * @param Email $email Email.
     *
     * @return User
     *
     * @throws EntityNotFoundException EntityNotFoundException.
     */
    public function getByEmail(Email $email): User
    {
        /** @var User $user */
        if (! $user = $this->repo->findOneBy(['email' => $email->getValue()])) {
            throw new EntityNotFoundException('User is not found.');
        }
        return $user;
    }

    /**
     * If user exists by Email.
     *
     * @param Email $email Email.
     *
     * @return boolean
     *
     * @throws NoResultException NoResultException.
     * @throws NonUniqueResultException NonUniqueResultException.
     */
    public function hasByEmail(Email $email): bool
    {
        return $this->repo->createQueryBuilder('t')
                ->select('COUNT(t.id)')
                ->andWhere('t.email = :email')
                ->setParameter(':email', $email->getValue())
                ->getQuery()->getSingleScalarResult() > 0;
    }

    /**
     * Add user.
     *
     * @param User $user User.
     *
     * @return void
     */
    public function add(User $user): void
    {
        $this->em->persist($user);
    }

    /**
     * Get all users.
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->repo->findAll();
    }
}
