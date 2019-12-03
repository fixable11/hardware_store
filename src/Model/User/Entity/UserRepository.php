<?php

declare(strict_types=1);

namespace App\Model\User\Entity;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Model\EntityNotFoundException;

/**
 * Class UserRepository.
 */
class UserRepository
{
    /**
     * @var EntityManagerInterface $em EntityManager instance.
     */
    private $em;

    /**
     * @var EntityRepository $repo Entity Repository.
     */
    private $repo;

    /**
     * UserRepository constructor.
     *
     * @param EntityManagerInterface $em Entity Manager.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository(User::class);
    }

    /**
     * Get user by id.
     *
     * @param Id $id
     *
     * @return User
     */
    public function get(Id $id): User
    {
        /** @var User $user */
        if (!$user = $this->repo->find($id->getValue())) {
            throw new EntityNotFoundException('User is not found.');
        }

        return $user;
    }

    /**
     * Get user from email.
     *
     * @param Email $email Email vo.
     *
     * @return User
     */
    public function getByEmail(Email $email): User
    {
        /** @var User $user */
        if (!$user = $this->repo->findOneBy(['email' => $email->getValue()])) {
            throw new EntityNotFoundException('User is not found.');
        }

        return $user;
    }

    /**
     * Checks if user exists in database.
     *
     * @param Email $email
     *
     * @return boolean
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
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
     * Add user to repository.
     *
     * @param User $user User entity.
     *
     * @return void
     */
    public function add(User $user): void
    {
        $this->em->persist($user);
    }
}