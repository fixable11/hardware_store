<?php

declare(strict_types=1);

namespace App\Model\User\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Webmozart\Assert\Assert;

/**
 * @ORM\Embeddable
 */
class ResetToken
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $token;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $expires;

    /**
     * ResetToken constructor.
     *
     * @param string            $token   Reset token.
     * @param DateTimeImmutable $expires Expires date.
     */
    public function __construct(string $token, DateTimeImmutable $expires)
    {
        Assert::notEmpty($token);

        $this->token = $token;
        $this->expires = $expires;
    }

    /**
     * @param DateTimeImmutable $date Datetime.
     *
     * @return boolean
     */
    public function isExpiredTo(DateTimeImmutable $date): bool
    {
        return $this->expires <= $date;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @internal for postLoad callback
     *
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return empty($this->token);
    }
}
