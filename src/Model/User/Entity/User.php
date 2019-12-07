<?php

declare(strict_types=1);

namespace App\Model\User\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use DomainException;
use Exception;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Swagger\Annotations as SWG;

/**
 * Class User.
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="users", uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"email"}),
 *     @ORM\UniqueConstraint(columns={"reset_token_token"})
 * })
 */
class User implements UserInterface
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_WAIT = 'wait';
    public const STATUS_BLOCKED = 'blocked';

    /**
     * @var Id $id Entity id.
     *
     * @SWG\Property(type="string", example="002d6fbc-16ae-11ea-8d71-362b9e155667", description="Identifier")
     *
     * @Groups("user")
     *
     * @ORM\Column(type="user_id")
     * @ORM\Id
     */
    private $id;

    /**
     * @var DateTimeImmutable $date Date of user creation.
     *
     * @SWG\Property(type="datetime", description="Datetime", example="2019-12-07 07:30:40")
     *
     * @Groups("user")
     *
     * @ORM\Column(type="datetime_immutable")
     */
    private $date;

    /**
     * @var Email $email Email.
     *
     * @ORM\Column(type="user_email", nullable=false)
     *
     * @SWG\Property(type="string", example="test@gmail.com", description="Email address.")
     *
     * @Groups("user")
     *
     */
    private $email;

    /**
     * @var array $roles Roles.
     *
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password.
     *
     * @SWG\Property()
     *
     * @ORM\Column(type="string", name="password_hash", nullable=false)
     */
    private $passwordHash;

    /**
     * @var string|null $confirmToken User's token.
     *
     * @ORM\Column(type="string", name="confirm_token", nullable=true)
     */
    private $confirmToken;

    /**
     * @var ResetToken|null $resetToken Token for resetting user's password.
     *
     * @ORM\Embedded(class="ResetToken", columnPrefix="reset_token_")
     */
    private $resetToken;

    /**
     * @var string $status User's status.
     *
     * @ORM\Column(type="string", length=16)
     */
    private $status;

    /**
     * @var Name $name Name.
     *
     * @SWG\Property(type="string", example="Username", description="Username")
     *
     * @ORM\Embedded(class="Name")
     *
     * @Groups("user")
     */
    private $name;

    /**
     * User constructor.
     *
     * @param Id                $id   Id vo.
     * @param DateTimeImmutable $date Date of user creation.
     * @param Name              $name User's name vo.
     */
    private function __construct(Id $id, DateTimeImmutable $date, Name $name)
    {
        $this->id = $id;
        $this->date = $date;
        $this->name = $name;
    }

    /**
     * Request for resetting password.
     *
     * @param ResetToken        $token Reset token.
     * @param DateTimeImmutable $date  Datetime.
     *
     * @return void
     *
     * @throws DomainException DomainException.
     */
    public function requestPasswordReset(ResetToken $token, DateTimeImmutable $date): void
    {
        if (! $this->isActive()) {
            throw new DomainException('User is not active.');
        }
        if (! $this->email->getValue()) {
            throw new DomainException('Email is not specified.');
        }
        if ($this->resetToken->getToken() && ! $this->resetToken->isExpiredTo($date)) {
            throw new DomainException('Resetting is already requested.');
        }
        $this->resetToken = $token;
    }

    /**
     * Method to reset password.
     *
     * @param DateTimeImmutable $date Datetime.
     * @param string            $hash Password hash.
     *
     * @return void
     *
     * @throws DomainException DomainException.
     */
    public function passwordReset(DateTimeImmutable $date, string $hash): void
    {
        if (! $this->resetToken) {
            throw new DomainException('Resetting is not requested.');
        }
        if ($this->resetToken->isExpiredTo($date)) {
            throw new DomainException('Reset token is expired.');
        }
        $this->passwordHash = $hash;
        $this->resetToken = null;
    }

    /**
     * @param Email $email Email.
     * @param Name  $name  Name.
     *
     * @return void
     */
    public function edit(Email $email, Name $name): void
    {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Create user.
     *
     * @param Id                $id    Id.
     * @param DateTimeImmutable $date  Date.
     * @param Name              $name  Name.
     * @param Email             $email Email.
     * @param string            $hash  Hash.
     *
     * @return static
     */
    public static function create(Id $id, DateTimeImmutable $date, Name $name, Email $email, string $hash): self
    {
        $user = new self($id, $date, $name);
        $user->email = $email;
        $user->passwordHash = $hash;
        $user->status = self::STATUS_ACTIVE;

        return $user;
    }

    /**
     * Activate user
     *
     * @return void
     *
     * @throws DomainException DomainException.
     */
    public function activate(): void
    {
        if ($this->isActive()) {
            throw new DomainException('User is already active.');
        }
        $this->status = self::STATUS_ACTIVE;
    }

    /**
     * Block user.
     *
     * @return void
     *
     * @throws DomainException DomainException.
     */
    public function block(): void
    {
        if ($this->isBlocked()) {
            throw new DomainException('User is already blocked.');
        }
        $this->status = self::STATUS_BLOCKED;
    }

    /**
     * Check if user blocked.
     *
     * @return boolean
     */
    public function isBlocked()
    {
        return $this->status === self::STATUS_BLOCKED;
    }

    /**
     * Confirm registration.
     *
     * @return void
     *
     * @throws DomainException DomainException.
     */
    public function confirmSignUp(): void
    {
        if (! $this->isWait()) {
            throw new DomainException('User is already confirmed.');
        }
        $this->status =self::STATUS_ACTIVE;
        $this->confirmToken = null;
    }

    /**
     * Change user's name.
     *
     * @param Name $name User's name vo.
     *
     * @return void
     */
    public function changeName(Name $name): void
    {
        $this->name = $name;
    }

    /**
     * Get user's name vo.
     *
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * Checks that user status equals to WAIT
     *
     * @return boolean
     */
    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    /**
     * Checks that user status equals to ACTIVE
     *
     * @return boolean
     */
    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * Get user's id.
     *
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * Get user's email.
     *
     * @return null|Email
     */
    public function getEmail(): ?Email
    {
        return $this->email;
    }

    /**
     * Gets password hash.
     *
     * @return string|null
     */
    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    /**
     * @return null|string
     */
    public function getConfirmToken(): ?string
    {
        return $this->confirmToken;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Returns the roles granted to the user.
     *
     * @return array (Role|string)[] The user roles
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string|null The encoded password if any
     */
    public function getPassword()
    {
        return $this->passwordHash;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email->getValue();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     *
     * @return null
     */
    public function eraseCredentials()
    {
        return null;
    }
}
