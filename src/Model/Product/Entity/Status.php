<?php

declare(strict_types=1);

namespace App\Model\Product\Entity;

use Webmozart\Assert\Assert;

/**
 * Class Status.
 */
class Status
{
    public const STATUS_ACTIVE = 'status_active';
    public const STATUS_INACTIVE = 'status_inactive';

    /**
     * @var string $value Status value.
     */
    private $value;

    /**
     * Role constructor.
     *
     * @param string $value Status value.
     */
    public function __construct(string $value)
    {
        Assert::oneOf($value, [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ]);

        $this->value = $value;
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
