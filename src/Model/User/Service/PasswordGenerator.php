<?php

declare(strict_types=1);

namespace App\Model\User\Service;

use Exception;
use Ramsey\Uuid\Uuid;

/**
 * Class PasswordGenerator.
 */
class PasswordGenerator
{
    /**
     * Generate password.
     *
     * @return string
     *
     * @throws Exception Exception.
     */
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
