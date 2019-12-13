<?php

declare(strict_types=1);

namespace App\Model\Product\Entity;


use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

/**
 * Class StatusType
 * phpcs:ignoreFile
 */
class StatusType extends StringType
{
    public const NAME = 'product_status';

    /**
     * @inheritdoc
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value instanceof Status ? $value->getValue() : $value;
    }

    /**
     * @inheritdoc
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return ! empty($value) ? new Status($value) : null;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @inheritdoc
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}