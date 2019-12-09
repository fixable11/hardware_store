<?php

declare(strict_types=1);

namespace App\Model\Product\Entity;

use Exception;
use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

/**
 * Class Sku.
 */
class Sku
{
    /**
     * @var string $value Sku value.
     */
    private $value;

    /**
     * Sku constructor.
     *
     * @param string $value Sku.
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
