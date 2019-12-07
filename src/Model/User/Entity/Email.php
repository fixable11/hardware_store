<?php

declare(strict_types=1);

namespace App\Model\User\Entity;

use InvalidArgumentException;
use Webmozart\Assert\Assert;

/**
 * Class Email.
 */
class Email
{
    /**
     * @var string $value Email.
     */
    private $value;

    /**
     * Email constructor.
     *
     * @param string $value Email.
     *
     * @throws InvalidArgumentException InvalidArgumentException.
     */
    public function __construct(string $value)
    {
        Assert::notEmpty($value);

        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Incorrect email');
        }

        $this->value = mb_strtolower($value);
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param self $other Other email.
     *
     * @return boolean
     */
    public function isEqual(self $other): bool
    {
        return $this->getValue() === $other->getValue();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
