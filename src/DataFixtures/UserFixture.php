<?php

namespace App\DataFixtures;

use App\Model\User\Entity\Email;
use App\Model\User\Entity\Id;
use App\Model\User\Entity\Name;
use App\Model\User\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Model\User\Service\PasswordHasher;

class UserFixture extends Fixture
{
    /**
     * @var PasswordHasher $hasher Password hasher.
     */
    private $hasher;

    public function __construct(PasswordHasher $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $hash = $this->hasher->hash('123123');

        $user = User::create(
            Id::next(),
            new \DateTimeImmutable(),
            new Name('John', 'Doe'),
            new Email('test@gmail.com'),
            $hash
        );

        $manager->persist($user);

        $user2 = User::create(
            Id::next(),
            new \DateTimeImmutable(),
            new Name('Adam', 'Smith'),
            new Email('test2@gmail.com'),
            $hash
        );

        $manager->persist($user2);

        $manager->flush();
    }
}
