<?php

declare(strict_types=1);

namespace App\Model\User\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Exception;
use Doctrine\ORM\Mapping as ORM;

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
class User
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_WAIT = 'wait';
    public const STATUS_BLOCKED = 'blocked';

    /**
     * @var Id $id Entity id.
     *
     * @ORM\Column(type="user_id")
     * @ORM\Id
     */
    private $id;

    /**
     * @var DateTimeImmutable $date Date of user creation.
     *
     * @ORM\Column(type="datetime_immutable")
     */
    private $date;

    /**
     * @var Email $email Email.
     *
     * @ORM\Column(type="user_email", nullable=false)
     */
    private $email;

    /**
     * @var string The hashed password.
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
     * @var ResetToken $resetToken Token for resetting user's password.
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
     * @var string|null
     *
     * @ORM\Column(type="string", name="new_email_token", nullable=true)
     */
    private $newEmailToken;

    /**
     * @var Name
     * @ORM\Embedded(class="Name")
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
     */
    public function requestPasswordReset(ResetToken $token, DateTimeImmutable $date): void
    {
        if (! $this->isActive()) {
            throw new \DomainException('User is not active.');
        }
        if (! $this->email) {
            throw new \DomainException('Email is not specified.');
        }
        if ($this->resetToken && !$this->resetToken->isExpiredTo($date)) {
            throw new \DomainException('Resetting is already requested.');
        }
        $this->resetToken = $token;
    }

    /**
     * Method to reset password.
     *
     * @param DateTimeImmutable $date Datetime.
     * @param string            $hash Password hash.
     */
    public function passwordReset(DateTimeImmutable $date, string $hash): void
    {
        if (!$this->resetToken) {
            throw new \DomainException('Resetting is not requested.');
        }
        if ($this->resetToken->isExpiredTo($date)) {
            throw new \DomainException('Reset token is expired.');
        }
        $this->passwordHash = $hash;
        $this->resetToken = null;
    }

    public function edit(Email $email, Name $name): void
    {
        $this->name = $name;
        $this->email = $email;
    }

    public static function create(Id $id, DateTimeImmutable $date, Name $name, Email $email, string $hash): self
    {
        $user = new self($id, $date, $name);
        $user->email = $email;
        $user->passwordHash = $hash;
        $user->status = self::STATUS_ACTIVE;
        return $user;
    }


    public function activate(): void
    {
        if ($this->isActive()) {
            throw new \DomainException('User is already active.');
        }
        $this->status = self::STATUS_ACTIVE;
    }

    public function block(): void
    {
        if ($this->isBlocked()) {
            throw new \DomainException('User is already blocked.');
        }
        $this->status = self::STATUS_BLOCKED;
    }

    public function isBlocked()
    {
        return $this->status === self::STATUS_BLOCKED;
    }

    /**
     * Confirm registration.
     *
     * @return void
     */
    public function confirmSignUp(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException('User is already confirmed.');
        }
        $this->status =self::STATUS_ACTIVE;
        $this->confirmToken = null;
    }

    /**
     * Change user's name.
     *
     * @param Name $name User's name vo.
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
     * @return bool
     */
    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    /**
     * Checks that user status equals to ACTIVE
     *
     * @return bool
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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
