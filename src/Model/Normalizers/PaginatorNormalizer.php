<?php

declare(strict_types=1);

namespace App\Model\Normalizers;

use App\Model\Category\Entity\Category;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class PaginatorSerializer.
 */
class PaginatorNormalizer
{
    /**
     * Serialize.
     *
     * @param PaginationInterface $pagination Pagination.
     *
     * @param NormalizerInterface $itemsNormalizer
     *
     * @return mixed
     *
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function normalize(PaginationInterface $pagination, NormalizerInterface $itemsNormalizer)
    {
        $response = [
            'current_page_number' => $pagination->getCurrentPageNumber(),
            'num_items_per_page' => $pagination->getItemNumberPerPage(),
            'items' => $itemsNormalizer->normalize($pagination->getItems()),
            'total_count' => $pagination->getTotalItemCount(),
        ];

        $serializer = new Serializer([new ObjectNormalizer], [new JsonEncoder()]);

        return $serializer->normalize($response, 'json');
    }
}