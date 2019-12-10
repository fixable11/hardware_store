<?php

declare(strict_types=1);

namespace App\Model\ValueObjects;

use Webmozart\Assert\Assert;

/**
 * Class Id.
 */
class Id
{
    /**
     * @var integer $value Id vo.
     */
    private $value;

    /**
     * Id constructor.
     *
     * @param integer $value Id.
     */
    public function __construct(int $value)
    {
        Assert::integer($value);
        Assert::greaterThan($value, 0, 'The entity ID must be a positive integer. Got: %s');
        $this->value = $value;
    }

    /**
     * Get value of vo.
     *
     * @return integer
     */
    public function getValue(): int
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
        return (string) $this->getValue();
    }
}