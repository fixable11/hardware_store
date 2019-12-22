<?php

declare(strict_types=1);

namespace App\Model\Product\Service;


use App\Model\Category\Entity\Category;
use App\Model\Normalizers\NormalizerInterface;
use App\Model\Product\Entity\Product;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ProductNormalizer implements NormalizerInterface
{
    /**
     * @var string
     */
    private $imagesDirectory;

    public function __construct(string $imagesDirectory)
    {
        $this->imagesDirectory = $imagesDirectory;
    }

    /**
     * Serialize.
     *
     * @param Product[] $products Products array.
     *
     * @return mixed
     *
     * @throws AnnotationException AnnotationException.
     * @throws ExceptionInterface ExceptionInterface.
     */
    public function normalize($products)
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

        return $serializer->normalize($products, 'json', $this->whitelistAttributes());
    }

    /**
     * @param Product $product
     *
     * @return mixed
     * @throws AnnotationException
     * @throws ExceptionInterface
     */
    public function normalizeOne(Product $product)
    {
        return $this->normalize([$product])[0];
    }

    /**
     * Attributes that will be shown to the client
     *
     * @return array
     */
    private function whitelistAttributes(): array
    {
        return [
            'groups' => 'product',
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
                'sku' => function ($obj) {
                    return (string) $obj;
                },
                'status' => function ($obj) {
                    return (string) $obj;
                },
                'photos' => function ($photos) {
                    return array_map(function ($photo) {
                        return preg_replace('/.*\/public/','', $this->imagesDirectory)
                            . DIRECTORY_SEPARATOR . $photo;
                    }, $photos);
                },
            ],
        ];
    }
}