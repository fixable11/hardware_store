<?php

declare(strict_types=1);

namespace App\Model\User\Entity;

use Exception;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

/**
 * Class Id.
 */
class Id
{
    /**
     * @var string $value Id vo.
     */
    private $value;

    /**
     * Id constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        Assert::notEmpty($value);
        $this->value = $value;
    }

    /**
     * Generate new UUID.
     *
     * @return self
     *
     * @throws Exception Exception.
     */
    public static function next(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    /**
     * Get value of vo.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Convert to string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}