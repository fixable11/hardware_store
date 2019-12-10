<?php

declare(strict_types=1);

namespace App\Model\Category\Service;

use App\Model\Category\Entity\Category;
use App\Model\User\Entity\Email;
use App\Model\User\Entity\Name;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class CategorySerializer.
 */
class CategorySerializer
{
    /**
     * Serialize.
     *
     * @param Category[] $categories Categories array.
     *
     * @return mixed
     *
     * @throws AnnotationException AnnotationException.
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function serialize(array $categories)
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $normalizer = new ObjectNormalizer(
            $classMetadataFactory,
            null,
            null,
            null,
            null,
            null,
            $this->makeContext()
        );

        $encoder = new JsonEncoder();

        $serializer = new Serializer([$normalizer], [$encoder]);

        return $serializer->normalize($categories, 'json', $this->whitelistAttributes());
    }

    /**
     * @param Category $category Category entity.
     *
     * @return mixed
     *
     * @throws AnnotationException AnnotationException.
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function serializeOne(Category $category)
    {
        return $this->serialize([$category])[0];
    }

    /**
     * Attributes that will be shown to the client
     *
     * @return array
     */
    private function whitelistAttributes(): array
    {
        return [
            'groups' => 'category',
        ];
    }

    /**
     * Creates callbacks context.
     *
     * @return array
     */
    private function makeContext(): array
    {
        return [
            AbstractNormalizer::CALLBACKS => [
                'id' => function ($obj) {
                    return (string) $obj;
                },
            ],
        ];
    }
}
