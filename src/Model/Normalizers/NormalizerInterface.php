<?php

declare(strict_types=1);


namespace App\Model\Normalizers;


interface NormalizerInterface
{
    /**
     * @param array|iterable $data Data to normalize.
     *
     * @return mixed
     */
    public function normalize($data);
}