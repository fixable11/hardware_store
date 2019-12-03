<?php

declare(strict_types=1);

namespace App\Model\User\Entity;

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

    public function __construct(string $value)
    {
        Assert::notEmpty($value);

        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Incorrect email');
        }

        $this->value = mb_strtolower($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(self $other): bool
    {
        return $this->getValue() === $other->getValue();
    }

    public function __toString()
    {
        return $this->getValue();
    }
}