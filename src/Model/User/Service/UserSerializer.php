<?php

declare(strict_types=1);

namespace App\Model\User\Service;

use App\Model\User\Entity\Email;
use App\Model\User\Entity\Name;
use App\Model\User\Entity\User;
use ArrayObject;
use DateTimeImmutable;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Model\User\UseCase\Create\CreateDto;

/**
 * Class Serializer.
 */
class UserSerializer
{
    /**
     * Serialize.
     *
     * @param array $users Users array.
     *
     * @return mixed
     *
     * @throws AnnotationException AnnotationException.
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function serialize(array $users)
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

        return $serializer->normalize($users, 'json', $this->whitelistAttributes());
    }

    /**
     * Attributes that will be shown to the client
     *
     * @return array
     */
    private function whitelistAttributes(): array
    {
        return [
            'groups' => 'user',
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
                'date' => function (DateTimeImmutable $date) {
                    return $date->format('Y-m-d H:i:s');
                },
                'email' => function (Email $email) {
                    return (string) $email;
                },
                'name' => function (Name $name) {
                    return [
                        'first' => $name->getFirst(),
                        'last' => $name->getLast(),
                    ];
                },
            ],
        ];
    }
}
