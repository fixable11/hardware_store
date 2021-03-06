<?php

declare(strict_types=1);

namespace App\Model\User\Entity;

use Webmozart\Assert\Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Name
{
    /**
     * @var string $firstName First name.
     *
     * @ORM\Column(type="string")
     */
    private $firstName;

    /**
     * @var string $lastName Last name.
     *
     * @ORM\Column(type="string")
     */
    private $lastMame;

    /**
     * Name constructor.
     *
     * @param string $firstName First name.
     * @param string $lastMame  Last name.
     */
    public function __construct(string $firstName, string $lastMame)
    {
        Assert::notEmpty($firstName);
        Assert::notEmpty($lastMame);

        $this->firstName = $firstName;
        $this->lastMame = $lastMame;
    }

    /**
     * Get first name.
     *
     * @return string
     */
    public function getFirst(): string
    {
        return $this->firstName;
    }

    /**
     * Get last name.
     *
     * @return string
     */
    public function getLast(): string
    {
        return $this->lastMame;
    }

    /**
     * Get full name.
     *
     * @return string
     */
    public function getFull(): string
    {
        return $this->firstName . ' ' . $this->lastMame;
    }
}
