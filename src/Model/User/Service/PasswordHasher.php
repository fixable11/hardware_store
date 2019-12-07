<?php

declare(strict_types=1);

namespace App\Model\User\Service;

use RuntimeException;

/**
 * Class PasswordHasher.
 */
class PasswordHasher
{
    /**
     * Make hash.
     *
     * @param string $password Password.
     *
     * @return string
     *
     * @throws RuntimeException RuntimeException.
     */
    public function hash(string $password): string
    {
        $hash = password_hash($password, PASSWORD_ARGON2I);
        if ($hash === false) {
            throw new RuntimeException('Unable to generate hash');
        }

        return $hash;
    }

    /**
     * Compares two passwords.
     *
     * @param string $password Password.
     * @param string $hash     Password hash.
     *
     * @return boolean
     */
    public function validate(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
