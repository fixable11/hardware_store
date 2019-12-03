<?php

declare(strict_types=1);

namespace App\Model;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class Flusher.
 */
class Flusher
{
    /**
     * @var EntityManagerInterface $em Entity Manager.
     */
    private $em;

    /**
     * Flusher constructor.
     *
     * @param EntityManagerInterface $em Entity Manager.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        $this->em->flush();
    }
}
